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
        $start_timestamp=$start_date." ".$start_time;
        // echo $start_timestamp;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $no=0;
        $type="idc";
        // echo $end_timestamp;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $email=$_SESSION['email'];
        $sql="INSERT INTO form (`sem`,`year`,`no`,`form_type`,`curr_sem`,`email_id`,`timestamp_created`,`start_timestamp`,`end_timestamp`,`no_of_preferences`) 
        VALUES('$sem','$year','$no','$type','$curr_sem','$email','$timestamp','$start_timestamp','$end_timestamp','$nop')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_idc.php");
    }else if(isset($_POST['deleteForm'])){
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $sql="DELETE FROM form WHERE sem='$sem' AND year='$year' AND form_type= 'idc'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_idc.php");
    }else if(isset($_POST['modifyForm'])){
        $nop=mysqli_escape_string($conn,$_POST['nop']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $curr_sem=mysqli_escape_string($conn,$_POST['curr_sem']);
        $oldsem=mysqli_escape_string($conn,$_POST['oldsem']);
        $oldyear=mysqli_escape_string($conn,$_POST['oldyear']);
        $start_date=mysqli_escape_string($conn,$_POST['start_date']);
        $start_time=mysqli_escape_string($conn,$_POST['start_time']);
        $start_timestamp=$start_date." ".$start_time;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $sql="UPDATE form SET no_of_preferences='$nop',sem='$sem',year='$year',curr_sem='$curr_sem',start_timestamp='$start_timestamp',
        end_timestamp='$end_timestamp' WHERE sem='$oldsem' AND year='$year' AND form_type='idc'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_idc.php");
    }
}

?>