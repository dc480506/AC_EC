<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    if(isset($_POST['save_changes'])){
        $rollno=mysqli_escape_string($conn,$_POST['rollno']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        // $email_id=mysqli_escape_string($conn,$_POST['email_id']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $allocate_status=mysqli_escape_string($conn,$_POST['allocate_status']);
        $output = shell_exec($cmd);
        header("Location: ../idc_view.php");
        exit();
    }
    else if(isset($_POST['delete_response'])){
        $email_id=mysqli_escape_string($conn,$_POST['email_id']);
        if(isset($_POST['delete_response'])){
            $sql="DELETE FROM student_preference_idc WHERE email_id='$email_id'";
        }
        mysqli_query($conn,$sql);
        exit();
    }
    else if(isset($_POST['update_response'])){
        $rollno_new=mysqli_escape_string($conn,$_POST['rollno_new']);
        $rollno_old=mysqli_escape_string($conn,$_POST['rollno_old']);
        $year_new=mysqli_escape_string($conn,$_POST['year_new']);
        $year_old=mysqli_escape_string($conn,$_POST['year_old']);
        $sem_new=mysqli_escape_string($conn,$_POST['sem_new']);
        $sem_old=mysqli_escape_string($conn,$_POST['sem_old']);
        $allocate_status_new=mysqli_escape_string($conn,$_POST['allocate_status_new']);
        $allocate_status_old=mysqli_escape_string($conn,$_POST['allocate_status_old']);
        $sql="UPDATE `student_preference_idc` SET `rollno`='$rollno_new',`sem`='$sem_new',`year`='$year_new'
        ,`allocate_status`='$allocate_status_new' WHERE `rollno`='$rollno_old'";
        mysqli_query($conn,$sql);
        exit();
    }

}
?>