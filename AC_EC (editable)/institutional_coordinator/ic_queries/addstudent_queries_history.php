<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    if(isset($_POST['save_changes'])){
        $fname=mysqli_escape_string($conn,$_POST['fname']);
        $mname=mysqli_escape_string($conn,$_POST['mname']);
        $lname=mysqli_escape_string($conn,$_POST['lname']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dep=mysqli_escape_string($conn,$_POST['department']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $rno=mysqli_escape_string($conn,$_POST['rno']);

        $file_name=$_FILES['Uploadfile']['name'];
        $target_location="../../../uploads\\".$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);

        $cmd='python student.py "'.$fname.'" "'.$lname.'" "'.$mname.'" "'.$year.'" "'.$dep.'" "'.$email.'" "'.$rno.'" "'.$target_location.'"';
        // $command = escapeshellcmd($cmd);
        //echo $cmd;
        $output = shell_exec($cmd);
        //echo $output;
        header("Location: ../student_history.php");
        exit();
    }
    else if(isset($_POST['delete_student'])){
        $email_id=mysqli_escape_string($conn,$_POST['email_id']);
        // $sem=mysqli_escape_string($conn,$_POST['sem']);
        // $year=mysqli_escape_string($conn,$_POST['year']);
        if(isset($_POST['delete_student'])){
            $sql="DELETE FROM student_log WHERE email_id='$email_id'";
        }
        // else if(isset($_POST['delete_course_log'])){
        //     $sql="DELETE FROM audit_course_log WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
        // }
        mysqli_query($conn,$sql);
        // header("Location: ../addcourse_ac.php");
        exit();
    }
    else if(isset($_POST['update_student'])){
        $fname_new=mysqli_escape_string($conn,$_POST['fname_new']);
        // $fname_old=mysqli_escape_string($conn,$_POST['fname_old']);
        $mname_new=mysqli_escape_string($conn,$_POST['mname_new']);
        // $mname_old=mysqli_escape_string($conn,$_POST['mname_old']);
        $lname_new=mysqli_escape_string($conn,$_POST['lname_new']);
        // $lname_old=mysqli_escape_string($conn,$_POST['lname_old']);
        $email_id_new=mysqli_escape_string($conn,$_POST['email_id_new']);
        $email_id_old=mysqli_escape_string($conn,$_POST['email_id_old']);
        $rollno_new=mysqli_escape_string($conn,$_POST['rollno_new']);
        $rollno_old=mysqli_escape_string($conn,$_POST['rollno_old']);
        $year_of_admission_new=mysqli_escape_string($conn,$_POST['year_of_admission_new']);
        $year_of_admission_old=mysqli_escape_string($conn,$_POST['year_of_admission_old']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        // $dept_name_old=mysqli_escape_string($conn,$_POST['dept_name_old']);
      
        // $current_sem_old=mysqli_escape_string($conn,$_POST['current_sem_old']);

        if($email_id_new != $email_id_old){
            // $query = "SELECT `email_id` FROM `faculty` WHERE `email_id`='$email_id_new'";
            $results = mysqli_query($conn,"select email_id from student_log where email_id='$email_id_new'");
            if(mysqli_num_rows($results) > 0){
                // echo "<script> 
                // console.log(".$email_id_new.")
                // $('#email_id_error').text('Sorry....This Email ID already exists');</script>";
                echo "Exists_email_id";
            }else{
                $sql="UPDATE `student_log` SET `email_id`='$email_id_new',`rollno`='$rollno_new',`fname`='$fname_new',
                `mname`='$mname_new',`lname`='$lname_new',`year_of_admission`='$year_of_admission_new',`dept_id`='$dept_id'
                 WHERE `email_id`='$email_id_old' AND `rollno`='$rollno_old'";
                mysqli_query($conn,$sql);
                exit();    
            }
        }
        else if($rollno_new != $rollno_old){
            // $query = "SELECT `email_id` FROM `faculty` WHERE `email_id`='$email_id_new'";
            $results = mysqli_query($conn,"select rollno from student_log where rollno='$rollno_new'");
            if(mysqli_num_rows($results) > 0){
                // echo "<script> 
                // console.log(".$email_id_new.")
                // $('#email_id_error').text('Sorry....This Email ID already exists');</script>";
                echo "Exists_rollno";
            }else{
                $sql="UPDATE `student_log` SET `email_id`='$email_id_new',`rollno`='$rollno_new',`fname`='$fname_new',
                `mname`='$mname_new',`lname`='$lname_new',`year_of_admission`='$year_of_admission_new',`dept_id`='$dept_id' WHERE `email_id`='$email_id_old' AND `rollno`='$rollno_old'";
                mysqli_query($conn,$sql);
                exit();    
            }
        }
        else{
            $sql="UPDATE `student_log` SET `email_id`='$email_id_new',`rollno`='$rollno_new',`fname`='$fname_new',
            `mname`='$mname_new',`lname`='$lname_new',`year_of_admission`='$year_of_admission_new',`dept_id`='$dept_id' WHERE `email_id`='$email_id_old' AND `rollno`='$rollno_old'";
            mysqli_query($conn,$sql);
            exit();
        }
    }

}
?>