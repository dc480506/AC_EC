<?php
include_once("../../../config.php");
include_once("../../verify.php");
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $email=mysqli_escape_string($conn,$_POST['email_id']);
        $rollno=mysqli_escape_string($conn,$_POST['rollno']);
        $marks=mysqli_escape_string($conn,$_POST['marks']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $program = mysqli_escape_string($conn, $_POST['program']);
        $upload_constraint = mysqli_escape_string($conn, $_POST['upload_constraint']);
        $role = $_SESSION['role'];
        $uploader_dept_id = isset($_SESSION['dept_id']) ? $_SESSION['dept_id'] : "";
        $file_name=$_FILES['Uploadfile']['name'];
        $target_location=$base_dir.$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);
        if($_POST['column_selection']=='email_id'){
            $args='["'.$sem.'","'.$year.'","email_id","'.$email.'","'.$marks.'","'.$target_location.'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname. '","' . $program . '","' . $upload_constraint . '","' . $role . '","' . $uploader_dept_id . '"]';

        }else if($_POST['column_selection']=='rollno'){
            $args='["'.$sem.'","'.$year.'","rollno","'.$rollno.'","'.$marks.'","'.$target_location.'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname. '","' . $program . '","' . $upload_constraint . '","' . $role . '","' . $uploader_dept_id . '"]';

        }
        $cmd='python student_marks.py '.$args;
        // $command = escapeshellcmd($cmd);
        // echo $cmd;
        $output = shell_exec($cmd." 2>&1");
        echo $output;
        exit();
?>