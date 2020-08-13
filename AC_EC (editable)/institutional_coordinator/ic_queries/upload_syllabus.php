<?php
include_once('../verify.php');
include_once('../../config.php');
include_once("../../Logger/CourseLogger.php");
$logger = CourseLogger::getLogger();
$year = $_POST['year'];
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$sem = $_POST["sem"];
$course_type_id = mysqli_escape_string($conn, $_POST['course_type_id']);
$program = mysqli_escape_string($conn, $_POST['program']);
$uploadedFile = $_FILES['UploadSyllabusfile'];
$ext = pathinfo($_FILES["UploadSyllabusfile"]["name"])['extension'];

$rel_dir_path = "syllabus/audit_course/" . $year . "/" . $sem;
$rel_file_path = $rel_dir_path . "/" . $cid . "_" . $cname . "." . $ext;
$target_location_dir = $base_dir . $rel_dir_path;
if (!is_dir($target_location_dir)) {
    mkdir($target_location_dir, 0777, true);
}
$target_location = $base_dir . $rel_file_path;

move_uploaded_file($_FILES['UploadSyllabusfile']['tmp_name'], $target_location);

$upload_time = date("Y-m-d H:i:s");
$table_name = "course";
if ($_POST['courseType'] == "PREVIOUS") {
    $table_name .= "_log";
}

$sql = "update " . $table_name . " set syllabus_path = '" . $rel_file_path . "' , upload_timestamp =  '" . $upload_time . "' where cid = '$cid' and sem='$sem' and year='$year' and course_type_id='$course_type_id' and program='$program'";

if (mysqli_query($conn, $sql)) {
    $active_status= $_SESSION['active_status'];
    $course_type_name=$_SESSION['course_type_name'];
    $affectedCourse=$cid." sem ".$sem." year ".$year." of ".$course_type_name;    
    $logger->courseSyllabusInserted($_SESSION['email'], $affectedCourse,$active_status);
    echo "uploaded successfully";

} else {
    echo "Something went wrong.";
}
