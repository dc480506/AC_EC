<?php
include('../../config.php');
include('../../emailTemplate.php');
class EmailQueue
{
    private static $emailQueueInstance;
    public $conn;
    public $GET_STUDENTS_QUERY = '';
    public $GET_FACULTY_QUERY = '';

    function __construct()
    {
        global $dbname, $servername, $username, $password, $port;
        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);
    }
    public static function getInstance()
    {
        if (self::$emailQueueInstance == null) {
            self::$emailQueueInstance = new EmailQueue();
        }
        return self::$emailQueueInstance;
    }

    public function sendCourseAllotmentEmailToStudents()
    {
        $this->GET_STUDENTS_QUERY =
            "SELECT s.email_id,s.fname,s.lname,sca.cid,sca.sem,sca.year,c.cname ,ct.name as course_type,spa.pref_no FROM {$_SESSION['student_course_table']} as sca
        inner join {$_SESSION['pref_student_alloted_table']} as spa
        inner join student s
        inner join course c
        INNER join course_types ct
        on spa.email_id = s.email_id and sca.email_id=spa.email_id
        and c.cid=sca.cid and sca.sem=c.sem and sca.year = c.year
        and c.course_type_id=ct.id";

        $studentsData = $this->getStudentsData();

        $this->queueStudentEmails($studentsData);
    }


    public function sendCourseAllotmentEmailToFaculty($email_id, $cid, $sem, $year, $program, $course_type_id)
    {

        $this->GET_FACULTY_QUERY = "select course.cname,course.sem,course.program,course_types.name from course inner join course_types on course.course_type_id = course_types.id and course.cid= '{$cid}' and course_types.id = {$course_type_id} and sem={$sem}";

        $result = $this->getFacultyData();

        $this->queueFacultyEmail($result, $email_id);
    }


    private function getStudentsData()
    {
        return $this->conn->query($this->GET_STUDENTS_QUERY);
    }

    private function getFacultyData()
    {
        return $this->conn->query($this->GET_FACULTY_QUERY);
    }



    private function queueStudentEmails($studentDetails)
    {
        $insert_to_email_queue_query = "insert into email_queue(to_email,subject,body) values";
        while ($row = mysqli_fetch_assoc($studentDetails)) {
            $subject = "Allotment for sem-{$row['sem']} {{$row['course_type']}";
            $body = getEmailTemplate($this->createStudentEmailBody($row['fname'], $row['lname'], $row['cid'], $row['cname'], $row['course_type'], $row['pref_no'], $row['sem'], $row['year']), "Student");
            $insert_to_email_queue_query .= "('{$row['email_id']}','$subject','$body'),";
        }

        $insert_to_email_queue_query = substr($insert_to_email_queue_query, 0, strlen($insert_to_email_queue_query) - 1) . ";";
        $this->conn->query($insert_to_email_queue_query);
    }

    private function queueFacultyEmail($facultyDetails, $email_id)
    {

        $insert_to_email_queue_query = "insert into email_queue(to_email,subject,body) values";
        while ($row = mysqli_fetch_assoc($facultyDetails)) {
            $subject = "Allotment for sem-{$row['sem']} {$row['name']}";
            $body =  "You have been alloted {$row['cname']} for Semester- {$row['sem']} for Program- {$row['program']} course - {$row['name']}";
            $body = getEmailTemplate($body, "Faculty");
            $insert_to_email_queue_query .= "('{$email_id}','$subject','$body'),";
        }

        $insert_to_email_queue_query = substr($insert_to_email_queue_query, 0, strlen($insert_to_email_queue_query) - 1) . ";";
        $this->conn->query($insert_to_email_queue_query);
    }

    private function createStudentEmailBody($fname, $lname, $cid, $cname, $course_type, $prefNo, $sem, $year)
    {
        $locale = 'en_US';
        $body = "<b>Hello $fname $lname,<b><br> You have been alloted <b>$cname - ($cid)</b> as your $course_type for sem $sem, year-$year. This course was your {$prefNo} preference as per the form filled by you for the same";
        return $body;
    }
}
