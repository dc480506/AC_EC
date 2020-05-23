<?php
include_once('../../verify.php');
include_once('../../../config.php');

$sem=$_POST['sem'];
$year=$_POST['year'];
$cname=$_POST['cname'];
$cid=$_POST['cid'];
$floating_dept=$_POST['floating_dept'];
$min=$_POST['min'];
$max=$_POST['max'];
$ad=$_POST['applicable_department'];
$file_name=$_FILES['Uploadfile']['name'];
$target_location=$base_dir.$file_name;
move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);
date_default_timezone_set('Asia/Kolkata');
$timestamp=date("Y-m-d H:i:s");
$args='["'.$sem.'","'.$year.'","'.$_SESSION['email'].'","'.$timestamp.'","'.$cname.'","'.$cid.'","'.$floating_dept.'","'.$min.'","'.$max.'","'.$ad.'","'.$target_location.'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'"]';
$cmd='python upcoming_audit_upload.py '.$args;
$output=shell_exec($cmd." 2>&1");
if(strpos($output,"Duplicate entry")){
    echo "Import Unsuccessful as adding caused duplicate entries";
}else{
    echo $output;
}
// echo $output;
// echo shell_exec($cmd);
?>