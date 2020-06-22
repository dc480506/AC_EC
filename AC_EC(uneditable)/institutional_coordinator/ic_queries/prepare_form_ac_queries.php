<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../config.php');
    // echo "Hi";
    if(isset($_POST['createForm'])){
        $nop=mysqli_escape_string($conn,$_POST['nop']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $curr_sem=mysqli_escape_string($conn,$_POST['curr_sem']);
        $start_date=mysqli_escape_string($conn,$_POST['start_date']);
        $start_time=mysqli_escape_string($conn,$_POST['start_time']);
        // echo $start_date;
        // echo $start_time;
        $current_date = date("Y-m-d");
        if($start_date==$current_date)
        {
            $timestamp = strtotime($start_time) + 60*60*2;
            $time = date('H:i', $timestamp);
            $start_time = $time;
        }
        
        $start_timestamp=$start_date." ".$start_time;
        // echo $start_timestamp;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $no=0;
        $type="audit";
        // echo $end_timestamp;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $email=$_SESSION['email'];
        mysqli_autocommit($conn,FALSE);
        $sql="INSERT INTO form (`sem`,`year`,`no`,`form_type`,`curr_sem`,`email_id`,`timestamp_created`,`start_timestamp`,`end_timestamp`,`no_of_preferences`) 
        VALUES('$sem','$year','$no','$type','$curr_sem','$email','$timestamp','$start_timestamp','$end_timestamp','$nop')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $sql="INSERT INTO student_form(`sem`,`year`,`no`,`form_type`,`email_id`)
         SELECT '$sem','$year','$no','$type',email_id FROM student WHERE current_sem='$curr_sem'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

        //for hide_student audit course
        $sql="INSERT INTO hide_student_audit_course (`email_id`,`cid`,`sem`,`year`,`cname`) 
        SELECT s.email_id,a.newcid,a.newsem,a.newyear,ac.cname from audit_map as a 
        inner join (SELECT email_id,cid,sem,year FROM student_audit 
        UNION ALL SELECT email_id,cid,sem,year FROM student_audit_log) as s
        ON s.cid=a.oldcid AND s.sem=a.oldsem AND s.year=a.oldyear AND a.newsem='$sem' AND a.newyear='$year'
        INNER JOIN audit_course as ac ON ac.cid= a.newcid
        EXCEPT SELECT email_id,cid,sem,year,cname FROM hide_student_audit_course WHERE sem='$sem' AND year='$year'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if(!mysqli_commit($conn)){
            header("Location: ../prepare_form_ac.php");
            // mysqli_autocommit($conn,TRUE);
            exit();
        }
        mysqli_close($conn);
        // mysqli_autocommit($conn,TRUE);
        header("Location: ../prepare_form_ac.php");
    }else if(isset($_POST['deleteForm'])){
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $sql="DELETE FROM form WHERE sem='$sem' AND year='$year' AND form_type= 'audit'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_ac.php");
    }else if(isset($_POST['modifyForm'])){
        $nop=mysqli_escape_string($conn,$_POST['nop']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $start_date=mysqli_escape_string($conn,$_POST['start_date']);
        $start_time=mysqli_escape_string($conn,$_POST['start_time']);
        $start_timestamp=$start_date." ".$start_time;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $sql="UPDATE form SET no_of_preferences='$nop',start_timestamp='$start_timestamp',
        end_timestamp='$end_timestamp' WHERE sem='$sem' AND year='$year' AND form_type='audit'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_ac.php");
    }
}
