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


}
?>