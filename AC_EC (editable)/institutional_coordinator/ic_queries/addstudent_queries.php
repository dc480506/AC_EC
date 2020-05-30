<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    if(isset($_POST['save_changes'])){
        $fname=mysqli_escape_string($conn,$_POST['fname']);
        $mname=mysqli_escape_string($conn,$_POST['mname']);
        $lname=mysqli_escape_string($conn,$_POST['lname']);
        $sem=mysqli_escape_string($conn,$_POST['semester']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dep=mysqli_escape_string($conn,$_POST['department']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $rno=mysqli_escape_string($conn,$_POST['rno']);

        $file_name=$_FILES['Uploadfile']['name'];
        $target_location="../../../uploads\\".$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);

        $cmd='python student.py "'.$fname.'" "'.$lname.'" "'.$mname.'" "'.$sem.'" "'.$year.'" "'.$dep.'" "'.$email.'" "'.$rno.'" "'.$target_location.'"';
        // $command = escapeshellcmd($cmd);
        //echo $cmd;
        $output = shell_exec($cmd);
        //echo $output;
        header("Location: ../addstudent.php");
        exit();
    }
    else if(isset($_POST['delete_student'])){
        $email_id=mysqli_escape_string($conn,$_POST['email_id']);
        // $sem=mysqli_escape_string($conn,$_POST['sem']);
        // $year=mysqli_escape_string($conn,$_POST['year']);
        if(isset($_POST['delete_student'])){
            $sql="DELETE FROM student WHERE email_id='$email_id'";
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
        $fname_old=mysqli_escape_string($conn,$_POST['fname_old']);
        $mname_new=mysqli_escape_string($conn,$_POST['mname_new']);
        $mname_old=mysqli_escape_string($conn,$_POST['mname_old']);
        $lname_new=mysqli_escape_string($conn,$_POST['lname_new']);
        $lname_old=mysqli_escape_string($conn,$_POST['lname_old']);
        $email_id_new=mysqli_escape_string($conn,$_POST['email_id_new']);
        $email_id_old=mysqli_escape_string($conn,$_POST['email_id_old']);
        $rollno_new=mysqli_escape_string($conn,$_POST['rollno_new']);
        $rollno_old=mysqli_escape_string($conn,$_POST['rollno_old']);
        $year_of_admission_new=mysqli_escape_string($conn,$_POST['year_of_admission_new']);
        $year_of_admission_old=mysqli_escape_string($conn,$_POST['year_of_admission_old']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        // $dept_name_old=mysqli_escape_string($conn,$_POST['dept_name_old']);
        $current_sem_new=mysqli_escape_string($conn,$_POST['current_sem_new']);
        $current_sem_old=mysqli_escape_string($conn,$_POST['current_sem_old']);
        // $year=mysqli_escape_string($conn,$_POST['year']);
        // $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        // $sql="SELECT dept_id FROM department WHERE dept_name='$dept_name_new'";
        // $result= mysqli_query($conn,$sql);
        // $row1 = mysqli_fetch_array($result);
        // $dept_id=$row1['dept_id'];
        // $name=explode(" ",$fname_new);
        // echo $name[0];
        // $fname=$name[0];
        // $mname=$name[1];
        // $lname=$name[2];
        // if(isset($_POST['update_student'])){
            $sql="UPDATE `student` SET `email_id`='$email_id_new',`rollno`='$rollno_new',`fname`='$fname_new',`mname`='$mname_new',`lname`='$lname_new'
            ,`year_of_admission`='$year_of_admission_new',`dept_id`='$dept_id',`current_sem`='$current_sem_new' WHERE `email_id`='$email_id_old' AND `rollno`='$rollno_old'";
            // $sql="UPDATE `student` SET `email_id`='ggg@somaiya.edu',`rollno`='1845121453451',`fname`='aset',`mname`='haeth',`lname`='haetheath'
            //,`year_of_admission`='2017',`current_sem`='3' WHERE `email_id`='gg@somaiya.edu' AND rollno='415231'";
            // $sql = "UPDATE `student` SET `dept_id`='$dept_id' WHERE `email_id`='gg@somaiya.edu'";
            // } 
        mysqli_query($conn,$sql);
        // header("Location: ../addcourse_ac.php");
        exit();
    }

}
?>