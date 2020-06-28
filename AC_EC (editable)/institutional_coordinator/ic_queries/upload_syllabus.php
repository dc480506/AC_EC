<?php
include_once('../verify.php');
include_once('../../config.php');
$year = $_POST['year'];
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$sem = $_POST["sem"];
$uploadedFile = $_FILES['UploadSyllabusfile'];
$ext = pathinfo($_FILES["UploadSyllabusfile"]["name"])['extension'];

$rel_dir_path = "syllabus/" . $year . "/" . $sem;
$rel_file_path = $rel_dir_path . "/" . $cid . "_" . $cname . "." . $ext;
$target_location_dir = $base_dir . $rel_dir_path;
if (!is_dir($target_location_dir)) {
    mkdir($target_location_dir, 0777, true);
}
$target_location = $base_dir . $rel_file_path;

move_uploaded_file($_FILES['UploadSyllabusfile']['tmp_name'], $target_location);

$upload_time = date("Y-m-d H:i:s");
$table_name = "audit_course";
if ($_POST['courseType'] == "PREVIOUS") {
    $table_name .= "_log";
}

$sql = "update " . $table_name . " set syllabus_path = '" . $rel_file_path . "' , upload_timestamp =  '" . $upload_time . "' where cid = '" . $cid . "'";

if (mysqli_query($conn, $sql)) {
    echo "uploaded successfully";
} else {
    echo "Something went wrong.";
}
