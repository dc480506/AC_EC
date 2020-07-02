<?php
include_once('../verify.php');
include_once('../../config.php');
$cid = $_POST['cid'];
$relPath = $_POST['syllabus_path'];

$absolutePath = $base_dir . $relPath;

unlink($absolutePath);

$table_name = "audit_course";
if ($_POST['type'] == "PREVIOUS") {
    $table_name .= "_log";
}

$sql = "update " . $table_name . " set syllabus_path = '' , upload_timestamp =  '' where cid = '" . $cid . "'";

if (mysqli_query($conn, $sql)) {
    echo "uploaded successfully";
} else {
    echo "Something went wrong.";
}
