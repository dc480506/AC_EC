<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"), true);

$currently_active = $data['currently_active'];

$delete_data = $data['delete_data'];
$del_condition = " (";
$update_condition = " (";
// echo var_dump($delete_data);
foreach ($delete_data as $key => $val) {
    // echo var_dump($val);
    $del_condition .= "email_id='" . $val['email_id'] . "' AND form_id='$form_id') OR (";
    $update_condition .= "email_id='" . $val['email_id'] . "' AND form_id='$form_id'') OR (";
    // $del_condition.="year='".$year."' AND ";
    // $del_condition.="sem='".$sem."') OR (";
}
// echo $del_condition;
$del_condition = substr($del_condition, 0, strlen($del_condition) - 4);
$update_condition = substr($update_condition, 0, strlen($update_condition) - 4);

// echo $del_condition;
if ($currently_active < 2) {
    $sql_pref_del = "DELETE FROM student_preferences WHERE " . $del_condition;
    $sql_stu_form_update = "UPDATE student_form SET form_filled=0 WHERE " . $update_condition;
} else {
    $sql_pref_del = "DELETE FROM student_preference_log WHERE " . $del_condition;
    $sql_stu_form_update = "UPDATE student_form_log SET form_filled=0 WHERE " . $update_condition;
}
echo $sql_pref_del;
echo $sql_stu_form_update;
mysqli_autocommit($conn, FALSE);
mysqli_query($conn, $sql_pref_del) or die(mysqli_error($conn));
mysqli_query($conn, $sql_stu_form_update) or die(mysqli_error($conn));
if (!mysqli_commit($conn)) {
    die(mysqli_error($conn));
}
mysqli_close($conn);
// echo $sql;
