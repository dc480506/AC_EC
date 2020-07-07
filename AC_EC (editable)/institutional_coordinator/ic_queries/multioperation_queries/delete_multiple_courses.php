<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['type'] == 'current') {
        $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
        $row = mysqli_fetch_assoc($result);
        $year = $row['academic_year'];
        $delete_data = $data['delete_data'];
        $course_type_id = $data['course_type_id'];
        $program = $data['program'];
        $del_condition = " (";
        // echo var_dump($delete_data);
        foreach ($delete_data as $key => $val) {
            // echo var_dump($val);
            $del_condition .= "cid='" . $val['cid'] . "' AND ";
            $del_condition .= "sem='" . $val['sem'] . "' AND ";
            $del_condition .= "year='" . $year . "') OR (";
        }
        // echo $del_condition;
        $del_condition = substr($del_condition, 0, strlen($del_condition) - 4);
        // echo $del_condition;
        $sql = "DELETE FROM course WHERE course_type_id = '$course_type_id' AND program='$program'  AND currently_active=1  AND " . $del_condition;
        mysqli_query($conn, $sql);
        // echo $sql;
    } else if ($data['type'] == 'upcoming') {
        $delete_data = $data['delete_data'];
        $del_condition = " (";
        // echo var_dump($delete_data);
        foreach ($delete_data as $key => $val) {
            // echo var_dump($val);
            $del_condition .= "cid='" . $val['cid'] . "' AND ";
            $del_condition .= "sem='" . $val['sem'] . "' AND ";
            $del_condition .= "year='" . $val['year'] . "') OR (";
        }
        // echo $del_condition;
        $del_condition = substr($del_condition, 0, strlen($del_condition) - 4);
        // echo $del_condition;
        $sql = "DELETE FROM course WHERE course_type_id = '$course_type_id' AND program='$program' AND currently_active=0 and " . $del_condition;
        mysqli_query($conn, $sql);
    } else if ($data['type'] == 'previous') {
        $delete_data = $data['delete_data'];
        $del_condition = " (";
        // echo var_dump($delete_data);
        foreach ($delete_data as $key => $val) {
            // echo var_dump($val);
            $del_condition .= "cid='" . $val['cid'] . "' AND ";
            $del_condition .= "sem='" . $val['sem'] . "' AND ";
            $del_condition .= "year='" . $val['year'] . "') OR (";
        }
        // echo $del_condition;
        $del_condition = substr($del_condition, 0, strlen($del_condition) - 4);
        // echo $del_condition;
        $sql = "DELETE FROM course_log WHERE course_type_id = '$course_type_id' AND program='$program'and " . $del_condition;
        mysqli_query($conn, $sql);
    }
}
