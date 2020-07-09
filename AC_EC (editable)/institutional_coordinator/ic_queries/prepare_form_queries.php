<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
    include_once('../../config.php');
    // echo "Hi";
    if (isset($_POST['createForm'])) {
        // die(json_encode($_POST));
        $nop = mysqli_escape_string($conn, $_POST['nop']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        $year = mysqli_escape_string($conn, $_POST['year']);
        $curr_sem = mysqli_escape_string($conn, $_POST['curr_sem']);
        $start_date = mysqli_escape_string($conn, $_POST['start_date']);
        $start_time = mysqli_escape_string($conn, $_POST['start_time']);
        $dept_applicable = $_POST['dept_applicable'];
        $program = mysqli_escape_string($conn, $_POST['program']);
        $course_type_id = $_POST['course_type_id'];

        $current_date = date("Y-m-d");
        if ($start_date == $current_date) {
            $timestamp = strtotime($start_time) + 60 * 60 * 2;
            $time = date('H:i', $timestamp);
            $start_time = $time;
        }

        $start_timestamp = $start_date . " " . $start_time;
        // echo $start_timestamp;
        $end_date = mysqli_escape_string($conn, $_POST['end_date']);
        $end_time = mysqli_escape_string($conn, $_POST['end_time']);
        $end_timestamp = $end_date . " " . $end_time;

        // echo $end_timestamp;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date("Y-m-d H:i:s");
        $email = $_SESSION['email'];
        mysqli_autocommit($conn, FALSE);
        $course_types_string = "('" . implode("','", $course_type_id) . "')";
        $checksql = "SELECT fcc.form_id,fcc.course_type_id FROM form_course_category_map as fcc INNER JOIN form f on f.form_id=fcc.form_id
                    WHERE f.sem='$sem' AND f.year='$year' AND f.program='$program' and fcc.course_type_id IN $course_types_string ";
        $checkResults = mysqli_query($conn, $checksql);
        if (mysqli_num_rows($checkResults) == 0) {
            $sql = "INSERT INTO form (`sem`,`year`,`program`,`curr_sem`,`email_id`,`timestamp_created`,`start_timestamp`,`end_timestamp`,`no_of_preferences`) 
                    VALUES('$sem','$year','$program','$curr_sem','$email','$timestamp','$start_timestamp','$end_timestamp','$nop');";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $form_id = mysqli_insert_id($conn);
            $insert_course_types = array();
            foreach ($course_type_id as $id) {
                array_push($insert_course_types, "('$form_id','$id')");
            }

            $sql_course_type_map = "INSERT INTO form_course_category_map values " . implode(",", $insert_course_types);

            $newsql = "INSERT INTO student_form(`form_id`,`email_id`,`dept_id`)
                       SELECT '$form_id',email_id, dept_id FROM student WHERE current_sem='$curr_sem' and dept_id in  (" . implode(",", $dept_applicable) . ");";


            $hidesql = "INSERT INTO hide_student_course (`email_id`,`cid`,`course_type_id`,`sem`,`year`,`cname`) 
                        SELECT s.email_id,a.newcid,a.new_course_type_id ,a.newsem,a.newyear,ac.cname from course_similar_map as a 
                        inner join (SELECT email_id,cid,sem,year FROM student_course_alloted 
                        UNION ALL SELECT email_id,cid,sem,year FROM student_course_alloted_log) as s
                        ON s.cid=a.oldcid AND s.sem=a.oldsem AND s.year=a.oldyear AND a.newsem='$sem' AND a.newyear='$year' AND a.new_course_type_id in $course_types_string
                        INNER JOIN course as ac ON ac.cid= a.newcid
                        EXCEPT SELECT email_id,cid,course_type_id,sem,year,cname FROM hide_student_course WHERE sem='$sem' AND year='$year' and course_type_id in $course_types_string;";


            mysqli_query($conn, $sql_course_type_map) or die(mysqli_error($conn));
            mysqli_query($conn, $newsql) or die(mysqli_error($conn));
            mysqli_query($conn, $hidesql) or die(mysqli_error($conn) . " " . $hidesql);


            foreach ($dept_applicable as $dept_id) {
                $applicabelDeptSql = "INSERT INTO form_applicable_dept(form_id, dept_id) VALUES ('$form_id','$dept_id');";
                mysqli_query($conn, $applicabelDeptSql) or die(mysqli_error($conn) . $applicabelDeptSql);
            }


            if (!mysqli_commit($conn)) {
                echo "error";
                // mysqli_autocommit($conn,TRUE);
                exit();
            }
            mysqli_close($conn);
            // mysqli_autocommit($conn,TRUE);
            echo " done";
        } else {
            die("present");
        }
    } else if (isset($_POST['deleteForm'])) {
        $form_id = mysqli_escape_string($conn, $_POST['form_id']);
        $sql = "DELETE FROM form WHERE form_id='$form_id'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo 'done';
    } else if (isset($_POST['modifyForm'])) {
        $nop = mysqli_escape_string($conn, $_POST['nop']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        $form_id = mysqli_escape_string($conn, $_POST['form_id']);

        $curr_sem = intval($sem) - 1;

        $year = mysqli_escape_string($conn, $_POST['year']);
        // die($year);
        $start_date = mysqli_escape_string($conn, $_POST['start_date']);
        $start_time = mysqli_escape_string($conn, $_POST['start_time']);
        $start_timestamp = $start_date . " " . $start_time;
        $end_date = mysqli_escape_string($conn, $_POST['end_date']);
        $end_time = mysqli_escape_string($conn, $_POST['end_time']);
        $dept_applicable = $_POST['dept_applicable'];
        $end_timestamp = $end_date . " " . $end_time;
        $sql = "UPDATE form SET no_of_preferences='$nop',start_timestamp='$start_timestamp',
        end_timestamp='$end_timestamp' WHERE form_id='$form_id'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $current_depts_query = "select dept_id from form_applicable_dept where form_id='$form_id'";
        $result = mysqli_query($conn, $current_depts_query);
        $old_depts = array();
        $deleted_depts = array();
        $added_depts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($old_depts, $row['dept_id']);
            if (!in_array($row['dept_id'], $dept_applicable)) {
                array_push($deleted_depts, $row['dept_id']);
            }
        }

        foreach ($dept_applicable as $dept) {
            if (!in_array($dept, $old_depts)) {
                array_push($added_depts, $dept);
            }
        }
        if (!empty($deleted_depts)) {
            $deleteApplicableDepts = "delete from form_applicable_dept where form_id='$form_id' and  dept_id in  ('" . implode("','", $deleted_depts) . "');";
            mysqli_query($conn, $deleteApplicableDepts) or die(mysqli_error($conn) . $deleteApplicableDepts);
            $deleteApplicablestudents = "delete from student_form where form_id='$form_id' and dept_id in  ('" . implode("','", $deleted_depts) . "');";
            mysqli_query($conn, $deleteApplicablestudents) or die(mysqli_error($conn) . $deleteApplicablestudents);
        }
        foreach ($added_depts as $dept_id) {
            $applicabelDeptSql = "INSERT INTO form_applicable_dept(form_iddept_id) VALUES ('$form_id','$dept_id');";
            mysqli_query($conn, $applicabelDeptSql) or die(mysqli_error($conn) . $applicabelDeptSql);
        }

        $newsql = "INSERT INTO student_form(`form_id`,`email_id`,`dept_id`)
         SELECT '$form_id',email_id , dept_id FROM student WHERE current_sem='$curr_sem' and dept_id in  ('" . implode("','", $added_depts) . "');";
        mysqli_query($conn, $newsql) or die(mysqli_error($conn) . $newsql);

        echo "done";
    } elseif (isset($_POST['getCourseTypes'])) {
        $program = mysqli_escape_string($conn, $_POST['program']);
        $sql = "select id,name from course_types where program='$program'";
        $result = mysqli_query($conn, $sql);
        $options = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }

        echo $options;
    }
}
