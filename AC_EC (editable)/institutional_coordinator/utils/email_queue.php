<?php
include('../config.php');


class EmailQueue
{
    private static $emailQueueInstance;
    const GET_STUDENTS_QUERY = "SELECT s.email_id,s.fname,s.lname,sca.cid,sca.sem,sca.year,c.cname ,ct.name as course_type,spa.pref_no FROM  `d403a9_student_course_alloted` as sca
                                    inner join `d403a9_pref_student_alloted` as spa
                                    inner join student s
                                    inner join course c
                                    INNER join course_types ct
                                    on spa.email_id = s.email_id and sca.email_id=spa.email_id
                                    and c.cid=sca.cid and sca.sem=c.sem and sca.year = c.year
                                    and c.course_type_id=ct.id";
    public $conn;

    function __construct()
    {
        global $dbname, $servername, $username, $password, $port;
        $this->$conn = new mysqli($servername, $username, $password, $dbname, $port);
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
        $studentsData = $this->getStudentsData();
        $this->queueStudentEmails($studentsData);
    }

    private function getStudentsData()
    {
        return $this->$conn->query(self::GET_STUDENTS_QUERY);
    }

    private function queueStudentEmails($studentDetails)
    {
        $insert_to_email_queue_query = "insert into email_queue(to_email,subject,body) values";
        while ($row = mysqli_fetch_assoc($studentDetails)) {
            $subject = "Allotment for sem-{$row['sem']} {{$row['course_type']}";
            $body = $this->createStudentEmailBody($row['fname'], $row['lname'], $row['cid'], $row['cname'], $row['course_type'], $row['pref_no'], $row['sem'], $row['year']);
            $insert_to_email_queue_query .= "('{$row['email_id']}','$subject','$body'),";
        }

        $insert_to_email_queue_query = substr($insert_to_email_queue_query, 0, strlen($insert_to_email_queue_query) - 1) . ";";
        $this->$conn->query($insert_to_email_queue_query);
    }

    private function createStudentEmailBody($fname, $lname, $cid, $cname, $course_type, $prefNo, $sem, $year)
    {
        $locale = 'en_US';
        $nf = new NumberFormatter($locale, NumberFormatter::ORDINAL);

        $body = "<b>Hello $fname $lname,<b><br> You have been alloted <b>$cname - ($cid)</b> as your $course_type for sem $sem, year-$year. This course was your {$nf->format($prefNo)} preference as per the form filled by you for the same";
        return $body;
    }
}
