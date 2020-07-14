<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"), true);
    $min = $data["min"];
    $max = $data["max"];
    // die(json_encode($data));
    // $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
    // $row = mysqli_fetch_assoc($result);
    $update_data = $data['update_data'];

    $sql = "update {$_SESSION['course_table']} set min= $min ,max=$max where cid in ('" . implode("','", $update_data) . "')";
    // die($sql);
    mysqli_query($conn, $sql);
    // echo $sql;
}
