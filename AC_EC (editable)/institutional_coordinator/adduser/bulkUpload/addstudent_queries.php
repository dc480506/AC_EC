<?php
include_once("../../../config.php");
include_once("../../verify.php");
$fname = mysqli_escape_string($conn, $_POST['fname']);
$mname = mysqli_escape_string($conn, $_POST['mname']);
$lname = mysqli_escape_string($conn, $_POST['lname']);
$sem = mysqli_escape_string($conn, $_POST['semester']);
$year = mysqli_escape_string($conn, $_POST['year']);
$dep = mysqli_escape_string($conn, $_POST['department']);
$email = mysqli_escape_string($conn, $_POST['email']);
$rno = mysqli_escape_string($conn, $_POST['rno']);
$program = mysqli_escape_string($conn, $_POST['program']);
<<<<<<< HEAD

=======
$upload_constraint = mysqli_escape_string($conn, $_POST['upload_constraint']);
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
$file_name = $_FILES['Uploadfile']['name'];
$target_location = $base_dir . $file_name;
$role = $_SESSION['role'];
$uploader_dept_id = isset($_SESSION['dept_id']) ? $_SESSION['dept_id'] : "";
move_uploaded_file($_FILES['Uploadfile']['tmp_name'], $target_location);
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
<<<<<<< HEAD
$args = '["' . $_SESSION['email'] . '","' . $timestamp . '","' . $fname . '","' . $lname . '","' . $mname . '","' . $sem . '","' . $year . '","' . $dep . '","' . $email . '","' . $rno . '","' . $target_location . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $program . '"]';
=======
$args = '["' . $_SESSION['email'] . '","' . $timestamp . '","' . $fname . '","' . $lname . '","' . $mname . '","' . $sem . '","' . $year . '","' . $dep . '","' . $email . '","' . $rno . '","' . $target_location . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $program . '","' . $upload_constraint . '","' . $role . '","' . $uploader_dept_id . '"]';
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
// echo $db;
$cmd = 'python student.py ' . $args;
// $command = escapeshellcmd($cmd);
// echo $cmd;
$output = shell_exec($cmd . " 2>&1");
echo $output;
exit();
