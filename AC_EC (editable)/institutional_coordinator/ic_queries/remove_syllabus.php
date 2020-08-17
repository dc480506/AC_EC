<?php
include_once('../verify.php');
include_once('../../config.php');
include_once("../../Logger/CourseLogger.php");
$logger = CourseLogger::getLogger();
$cid = $_POST['cid'];
$year = $_POST['year'];
$sem = $_POST["sem"];
$course_type_id = $_POST["course_type_id"];
$relPath = $_POST['syllabus_path'];

$absolutePath = $base_dir . $relPath;

unlink($absolutePath);

$table_name = "course";
if ($_POST['type'] == "PREVIOUS") {
    $table_name .= "_log";
}

$sql = "update " . $table_name . " set syllabus_path = '' , upload_timestamp =  '' where cid = '$cid' and sem='$sem' and year='$year' and course_type_id='$course_type_id' ";

if (mysqli_query($conn, $sql)) {
  
    $active_status= $_SESSION['active_status'];
    $course_type_name=$_SESSION['course_type_name'];
    $affectedCourse=$cid." sem ".$sem." year ".$year." of ".$course_type_name;    
    $logger->courseSyllabusDeleted($_SESSION['email'], $affectedCourse,$active_status);
    echo "Removed successfully";
} else {
    echo "Something went wrong.";
}
