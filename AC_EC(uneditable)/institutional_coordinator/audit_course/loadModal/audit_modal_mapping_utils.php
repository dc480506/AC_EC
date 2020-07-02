<?php

include_once('../../verify.php');
include_once('../../../config.php');

$dataFor = $_POST["dataFor"];

if ($dataFor == "semester") {
    $year = $_POST['year'];
    $response = "";
    $sql = "(select distinct(sem) from audit_course where year = '" . $year . "')" . " union " . "(select distinct(sem) from audit_course_log where year = '" . $year . "')";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $response .= '<option value="' . $row["sem"] . '">' . $row["sem"] . '</option>';
    }
    echo $response;
} else if ($dataFor == "courses") {
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $response = "";
    $sql = "(select cid,cname from audit_course where year = '" . $year . "' and sem = '" . $sem . "')" . " UNION " . "(select cid,cname from audit_course_log where year = '" . $year . "' and sem = '" . $sem . "')";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $response .= '<option value="' . $row["cid"] . '">' . $row["cname"] . " (" . $row["cid"] . ")" . '</option>';
    }
    echo $response;
}
