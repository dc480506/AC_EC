<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='faculty_co'){
    include_once('../../config.php');
    // echo "Hi";
    if(isset($_POST['submit'])){
        $nop=mysqli_escape_string($conn,$_POST['no_of_preferences']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $curr_sem=mysqli_escape_string($conn,$_POST['curr_sem']);
        $start_date=mysqli_escape_string($conn,$_POST['start_date']);
        $start_time=mysqli_escape_string($conn,$_POST['start_time']);
        // echo $start_date;
        // echo $start_time;
        $dept_id=$_SESSION['dept_id'];
        $start_timestamp=$start_date." ".$start_time;
        // echo $start_timestamp;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $no=mysqli_escape_string($conn,$_POST['electivenumber']);
        $type="closed ele";
        // echo $end_timestamp;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $email=$_SESSION['email'];
        $sql="INSERT INTO closed_elective_dept_form (`sem`,`year`,`no`,`form_type`,`curr_sem`,`email_id`,`timestamp_created`,`start_timestamp`,`end_timestamp`,`no_of_preferences`,`dept_id`) 
        VALUES('$sem','$year','$no','$type','$curr_sem','$email','$timestamp','$start_timestamp','$end_timestamp','$nop','$dept_id');";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        // $insert_dept="INSERT INTO closed_elective_dept_applicable (`sem`,`year`,`no`,`form_type`,`dept_id`) VALUES('$sem','$year','$no','$type','$_SESSION['dept_id']');";
        // mysqli_query($conn,$insert_dept) or die(mysqli_error($conn));
        header("Location: ../prepare_form_cec.php");
    }else if(isset($_POST['deleteForm'])){
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $no=mysqli_escape_string($conn,$_POST['electivenumber']);
        $dept_id=$_SESSION['dept_id'];
        // $sql="DELETE FROM form WHERE sem='$sem' AND year='$year' AND form_type= 'closed ele' AND no= '$no';";
        // mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $delete_form="DELETE FROM closed_elective_dept_form WHERE sem='$sem' AND year='$year' AND form_type= 'closed ele' AND no='$no' AND dept_id=$dept_id;";
        mysqli_query($conn,$delete_form) or die(mysqli_error($conn));
        header("Location: ../prepare_form_cec.php");
    }else if(isset($_POST['modifyForm'])){
        $dept_id=$_SESSION['dept_id'];
        $no=mysqli_escape_string($conn,$_POST['electivenumber']);
        $nop=mysqli_escape_string($conn,$_POST['no_of_preferences']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $oldsem=mysqli_escape_string($conn,$_POST['oldsem']);
        $curr_sem=mysqli_escape_string($conn,$_POST['curr_sem']);
        $oldyear=mysqli_escape_string($conn,$_POST['oldyear']);
        $start_date=mysqli_escape_string($conn,$_POST['start_date']);
        $start_time=mysqli_escape_string($conn,$_POST['start_time']);
        $start_timestamp=$start_date." ".$start_time;
        $end_date=mysqli_escape_string($conn,$_POST['end_date']);
        $end_time=mysqli_escape_string($conn,$_POST['end_time']);
        $end_timestamp=$end_date." ".$end_time;
        $sql="UPDATE closed_elective_dept_form SET no_of_preferences='$nop',sem='$sem',curr_sem='$curr_sem',year='$year',start_timestamp='$start_timestamp',
        end_timestamp='$end_timestamp' WHERE sem='$oldsem' AND year='$year' AND form_type='closed ele' AND no='$no' AND dept_id='$dept_id'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../prepare_form_cec.php");
    }
}

?>