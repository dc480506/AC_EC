<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
    include_once('../../config.php');
    // echo "Hi";
    // die(json_encode($_POST));
    if (isset($_POST['createForm'])) {
        $nop = mysqli_escape_string($conn, $_POST['nop']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        $year = mysqli_escape_string($conn, $_POST['year']);
        $curr_sem = mysqli_escape_string($conn, $_POST['curr_sem']);
        $start_date = mysqli_escape_string($conn, $_POST['start_date']);
        $start_time = mysqli_escape_string($conn, $_POST['start_time']);
        $dept_applicable = $_POST['dept_applicable'];
        // echo $start_date;
        // echo $start_time;
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
        $no = 0;
        $type = "audit";
        // echo $end_timestamp;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date("Y-m-d H:i:s");
        $email = $_SESSION['email'];
        mysqli_autocommit($conn, FALSE);
        $sql = "INSERT INTO form (`sem`,`year`,`no`,`form_type`,`curr_sem`,`email_id`,`timestamp_created`,`start_timestamp`,`end_timestamp`,`no_of_preferences`) 
        VALUES('$sem','$year','$no','$type','$curr_sem','$email','$timestamp','$start_timestamp','$end_timestamp','$nop');";




        $newsql = "INSERT INTO student_form(`sem`,`year`,`no`,`form_type`,`email_id`,`dept_id`)
         SELECT '$sem','$year','$no','$type',email_id, dept_id FROM student WHERE current_sem='$curr_sem' and dept_id in  (" . implode(",", $dept_applicable) . ");";
        $hidesql = "INSERT INTO hide_student_audit_course (`email_id`,`cid`,`sem`,`year`,`cname`) 
        SELECT s.email_id,a.newcid,a.newsem,a.newyear,ac.cname from audit_map as a 
        inner join (SELECT email_id,cid,sem,year FROM student_audit 
        UNION ALL SELECT email_id,cid,sem,year FROM student_audit_log) as s
        ON s.cid=a.oldcid AND s.sem=a.oldsem AND s.year=a.oldyear AND a.newsem='$sem' AND a.newyear='$year'
        INNER JOIN audit_course as ac ON ac.cid= a.newcid
        EXCEPT SELECT email_id,cid,sem,year,cname FROM hide_student_audit_course WHERE sem='$sem' AND year='$year';";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        mysqli_query($conn, $newsql) or die(mysqli_error($conn));
        mysqli_query($conn, $hidesql) or die(mysqli_error($conn));


        foreach ($dept_applicable as $dept_id) {
            $applicabelDeptSql = "INSERT INTO form_applicable_dept(sem,year,no,form_type, dept_id) VALUES ('$sem','$year','$no','$type','$dept_id');";
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
    } else if (isset($_POST['deleteForm'])) {
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        $year = mysqli_escape_string($conn, $_POST['year']);
        $sql = "DELETE FROM form WHERE sem='$sem' AND year='$year' AND form_type= 'audit'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo 'done';
    } else if (isset($_POST['modifyForm'])) {
        $nop = mysqli_escape_string($conn, $_POST['nop']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
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
        end_timestamp='$end_timestamp' WHERE sem='$sem' AND year='$year' AND form_type='audit'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $current_depts_query = "select dept_id from form_applicable_dept where sem='$sem' and year='$year' and form_type='audit'";
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
        if(!empty($deleted_depts)){
            $deleteApplicableDepts = "delete from form_applicable_dept where sem = '$sem' and year = '$year' and form_type = 'audit' and  dept_id in  ('" . implode("','", $deleted_depts) . "');";
            mysqli_query($conn, $deleteApplicableDepts) or die(mysqli_error($conn) . $deleteApplicableDepts);
            $deleteApplicablestudents = "delete from student_form where sem = '$sem' and year = '$year' and form_type = 'audit' and dept_id in  ('" . implode("','", $deleted_depts) . "');";
            mysqli_query($conn, $deleteApplicablestudents) or die(mysqli_error($conn) . $deleteApplicablestudents);
        }
        foreach ($added_depts as $dept_id) {
            $applicabelDeptSql = "INSERT INTO form_applicable_dept(sem,year,no,form_type, dept_id) VALUES ('$sem','$year','0','audit','$dept_id');";
            mysqli_query($conn, $applicabelDeptSql) or die(mysqli_error($conn) . $applicabelDeptSql);
        }

        $newsql = "INSERT INTO student_form(`sem`,`year`,`no`,`form_type`,`email_id`,`dept_id`)
         SELECT '$sem','$year','0', 'audit',email_id , dept_id FROM student WHERE current_sem='$curr_sem' and dept_id in  ('" . implode("','", $added_depts) . "');";
        mysqli_query($conn, $newsql) or die(mysqli_error($conn) . $newsql);

        echo "done";
    }
}
