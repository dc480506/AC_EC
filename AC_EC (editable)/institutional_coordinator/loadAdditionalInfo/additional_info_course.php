<?php
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once('../../config.php');
    $tables = array('course' => "course", 'faculty_course_alloted' => 'faculty_course_alloted');
    $data = json_decode(file_get_contents("php://input"), true);
    $cid = $data['cid'];
    $sem = $data['sem'];
    $year = isset($data['year']) ? $data['year'] : "";
    $course_type_id = $data['course_type_id'];
    $program = $data['program'];

    $role_restriction = "";

    if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
        $sql = "select * from course_floating_dept where cid='$cid' AND sem='$sem' AND year='$year' and course_type_id='$course_type_id' 
            and program='$program' and dept_id='{$_SESSION['dept_id']}' 
             union
            select * from course_floating_dept_log where cid='$cid' AND sem='$sem' AND year='$year' and course_type_id='$course_type_id' 
            and program='$program' and dept_id='{$_SESSION['dept_id']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $role_restriction = "disabled";
        }
    }

    if ($data['type'] == "previous") {
        $tables['course'] = "course_log";
        $tables['faculty_course_alloted'] = "faculty_course_alloted_log";
    } else if ($data['type'] == "current") {
        $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
        $row = mysqli_fetch_assoc($result);
        $year = $row['academic_year'];
    }



    $_SESSION['cid'] = $cid;
    $_SESSION['sem'] = $sem;
    $_SESSION['year'] = $year;
    $_SESSION['course_type_id'] = $course_type_id;
    $_SESSION['active'] = 1;

    $getCourseInfoQuery = "SELECT timestamp,email_id,syllabus_path FROM {$tables['course']} WHERE cid='$cid' AND sem='$sem' AND year='$year'  and course_type_id='$course_type_id' and program='$program'";
    $courseInfoResult = mysqli_query($conn, $getCourseInfoQuery);
    $courseInfo = mysqli_fetch_assoc($courseInfoResult);
    // die(json_encode($getCourseInfoQuery));
    $timestamp = date_format(date_create($courseInfo['timestamp']), 'd-M-Y h:i:s A');
    $syllabus_link = $courseInfo['syllabus_path'];
    $syllabus_field = ' <a href="ic_queries/download_syllabus.php?file=' . urlencode($syllabus_link) . '">Download</a>';
    if ($syllabus_link == "") {
        $syllabus_field = '<small><span>Syllabus not present</span></small>';
    }
    $email_id = $courseInfo['email_id'];


    $similarCoursesQuery = "(SELECT cname,oldcid,oldsem, name ,oldyear FROM course INNER JOIN course_similar_map INNER JOIN course_types as ct
                ON newcid='$cid' AND newsem='$sem' AND newyear='$year' and new_course_type_id='$course_type_id' AND oldcid=cid AND oldsem=sem AND oldyear=year and old_course_type_id=course_type_id and old_course_type_id = ct.id)
                UNION
               (SELECT cname,oldcid,oldsem, name ,oldyear FROM course_log INNER JOIN course_similar_map INNER JOIN course_types as ct
                ON newcid='$cid' AND newsem='$sem' AND newyear='$year' and new_course_type_id='$course_type_id' AND oldcid=cid AND oldsem=sem AND oldyear=year and old_course_type_id=course_type_id and old_course_type_id = ct.id)
                ";
    $result = mysqli_query($conn, $similarCoursesQuery);
    $similar_courses = "";
    if (mysqli_num_rows($result) == 0) {
        $similar_courses = "<p><i><small>No similar courses found</small></i></p>";
    } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $similar_courses .= "<p><small>" . $i . ") " . $row['cname'] . " (Course ID: " . $row['oldcid'] . " , Sem: " . $row['oldsem'] . " , Year: " . $row['oldyear'] . " , Type: " . $row['name'] . ")</small></p>";
            $i++;
        }
    }


    $facultyAllotedQuery = "SELECT post,fname,mname,lname,faculty_code FROM {$tables['faculty_course_alloted']} fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.course_type_id='$course_type_id' AND fa.email_id=f.email_id";
    $result = mysqli_query($conn, $facultyAllotedQuery);
    $faculty_info = "";
    if (mysqli_num_rows($result) == 0) {
        $faculty_info = "<p><i><small>No faculties found for this course</small></i></p>";
    } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $faculty_info .= "<p><small>" . $i . ") " . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " (" . $row['faculty_code'] . ")</small></p>";
            $i++;
        }
    }


    echo '<div class="form-row">
            <div class="form-group col-md-4">
                <label for="added_by"><b>Added by: </b></label>
                <small><span>' . $email_id . '</span></small>
            </div>
            <div class="form-group col-md-4">
                <label for="added_on"><b>Added on: </b></label>
                <small><span>' . $timestamp . '</span></small>
            </div>
            <div class="form-group col-md-4">
                <label for="syllabus"><b>Syllabus: </b></label>
                ' . $syllabus_field . '
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="similar_courses_info"><b>Similar Courses Info: </b></label>'
        . $similar_courses . '
            </div>
            <div class="form-group col-md-6">
                <label for="faculties_assigned"><b>Faculties assigned: </b></label>'
        . $faculty_info . '
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <a href="loadAdditionalInfo/additional_info_course_students.php">          
                <button ' . $role_restriction . ' type="submit" class="btn btn-primary"  role="button" >View Enrolled Students</button>    
                </a>
            </div>
        </div>
    ';
}
