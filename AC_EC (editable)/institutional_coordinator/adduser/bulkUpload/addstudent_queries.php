<?php
include_once("../../../config.php");
include_once("../../verify.php");
        $fname=mysqli_escape_string($conn,$_POST['fname']);
        $mname=mysqli_escape_string($conn,$_POST['mname']);
        $lname=mysqli_escape_string($conn,$_POST['lname']);
        $sem=mysqli_escape_string($conn,$_POST['semester']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dep=mysqli_escape_string($conn,$_POST['department']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $rno=mysqli_escape_string($conn,$_POST['rno']);

        $file_name=$_FILES['Uploadfile']['name'];
        $target_location=$base_dir.$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
       $args='["'.$_SESSION['email'].'","'.$timestamp.'","'.$fname.'","'.$lname.'","'.$mname.'","'.$sem.'","'.$year.'","'.$dep.'","'.$email.'","'.$rno.'","'.$target_location.'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'"]';
        // echo $db;
        $cmd='python student.py '.$args;
        // $command = escapeshellcmd($cmd);
        // echo $cmd;
        $output = shell_exec($cmd." 2>&1");
        echo $output;
        exit();
?>