<?php

include_once('../../verify.php');
include_once('../../../config.php');

$dataFor = $_POST["dataFor"];

if ($dataFor == "semester") {
    $year = $_POST['year'];
    $program = $_POST['program'];
    $response = "";
    $sql = "(select distinct(sem) from course where year = '$year' and program='$program')" . " union " . "(select distinct(sem) from course_log where year = '$year' and program='$program')";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $response .= '<option value="' . $row["sem"] . '">' . $row["sem"] . '</option>';
    }
    echo $response;
} else if ($dataFor == "courses") {
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $program = $_POST['program'];
    $response = "";
    $sql = "(select cid,cname,name as course_type,course_type_id from course as c inner join course_types as ct on c.course_type_id = ct.id  where c.year = '$year' and c.sem = '$sem ' and c.program='$program')" . " UNION " . "(select cid,cname,name as course_type,c.course_type_id from course_log as c inner join course_types as ct on c.course_type_id = ct.id  where c.year = '$year' and c.sem = '$sem ' and c.program='$program')";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $response .= '<option value="' . $row["cid"] . '-' . $row['course_type_id'] . '">' . $row["cname"] . " (" . $row["cid"] . ") - " . $row['course_type'] . '</option>';
    }
    echo $response;
}
