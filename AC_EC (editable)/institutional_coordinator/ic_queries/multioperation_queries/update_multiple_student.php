<?php
session_start();
if (isset($_SESSION['email']) && (($_SESSION['role'] == 'inst_coor') || ($_SESSION['role'] == 'faculty_co') || ($_SESSION['role'] == 'HOD'))) {
    include_once('../../../config.php');
    include_once("../../../Logger/StudentLogger.php");
    $logger = StudentLogger::getLogger();
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['type'] == 'student') {
        $sem = $data["sem"];
        $year = $data["year"];
        $dept_id = $data["dept_id"];
        $update_data = $data['update_data'];
        $role_restriction = "";
        if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
            $role_restriction = " and dept_id='{$_SESSION['dept_id']}' ";
        }
        $update_condition = " (";

        foreach ($update_data as $key => $val) {
            $update_condition .= "email_id='" . $val['email_id'] . "') OR (";
            $logger->studentModified($_SESSION['email'], $val['email_id'], $val['program']);
        }


        $update_condition = substr($update_condition, 0, strlen($update_condition) - 4);


        $sql = "UPDATE student  set current_sem= $sem ,year_of_admission=$year,dept_id=$dept_id where (" . $update_condition . " ) " . $role_restriction;

        echo $sql;
        mysqli_query($conn, $sql);

        // echo $sql;
    }
}
