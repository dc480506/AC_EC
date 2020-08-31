<?php
include_once('../../verify.php');
include_once('../../../config.php');

$fcode = $_POST['fcode'];
$eid = $_POST['eid'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$emailid = $_POST['emailid'];
$department = $_POST['department'];
// $role = $_POST['role'];
$post = $_POST['post'];
$upload_constraint = mysqli_escape_string($conn, $_POST['upload_constraint']);
$login_role = $_SESSION['role'];
$uploader_dept_id = isset($_SESSION['dept_id']) ? $_SESSION['dept_id'] : "";

$file_name = $_FILES['Uploadfile']['name'];
$target_location = $base_dir . $file_name;
move_uploaded_file($_FILES['Uploadfile']['tmp_name'], $target_location);
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$cmd = 'python internalfaculty.py "' . $_SESSION['email'] . '" "' . $timestamp . '" "' . $fname . '" "' . $mname . '" "' . $lname . '" "' . $eid . '" "' . $fcode . '" "' . $emailid . '" "' . $department . '" "' . $post . '" "' . ' ' . '" "' . $servername . '" "' . $target_location . '" "' . $username . '" "' . $dbname . '" "' . $password . '" "' . $upload_constraint . '" "' . $login_role . '" "' . $uploader_dept_id . '"  ';
//echo $cmd;
$output = shell_exec($cmd);
echo $output;
//  if(strpos($output,"Duplicate entry")){
//     echo "Import Unsuccessful as adding caused duplicate entries";
// }else{
//     echo $output;
// }
