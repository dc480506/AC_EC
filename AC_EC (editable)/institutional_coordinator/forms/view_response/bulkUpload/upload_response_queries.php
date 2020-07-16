<?php
include_once("../../../../config.php");
include_once("../../../verify.php");
$sem = mysqli_escape_string($conn, $_POST['semester']);
$year = mysqli_escape_string($conn, $_POST['year']);
$form_id = mysqli_escape_string($conn, $_POST['form_id']);
$rno = mysqli_escape_string($conn, $_POST['rno']);
$email = mysqli_escape_string($conn, $_POST['email']);
$tstamp = mysqli_escape_string($conn, $_POST['tstamp']);
$status = mysqli_escape_string($conn, $_POST['status']);
$npre = mysqli_escape_string($conn, $_POST['npre']);
$no = 0;
$total_pref = mysqli_escape_string($conn, $_POST['total_pref']);
$npref = [];
for ($i = 1; $i <= $total_pref; $i++) {
    $npref[$i] = mysqli_escape_string($conn, $_POST['prefid' . (string) $i]);
}

$file_name = $_FILES['Uploadfile']['name'];
$target_location = $base_dir . $file_name;
move_uploaded_file($_FILES['Uploadfile']['tmp_name'], $target_location);
$result = mysqli_query($conn, "SELECT count(*) as total_cols FROM information_schema.columns WHERE table_name = 'student_preferences'
        ");
$row = mysqli_fetch_assoc($result);
$total_cols_table = $row['total_cols'];
$current_pref_columns = $total_cols_table - $other_pref_cols_audit_count;
// echo $current_pref_columns . "<br>";
if ($npre > $current_pref_columns) {
    $new_col_no = $current_pref_columns + 1;
    $after_col_num = $current_pref_columns;
    $add_cols = " ";
    for ($i = 0; $i < $npre - $current_pref_columns; $i++) {
        $add_cols .= ' ADD COLUMN `pref' . $new_col_no . '` VARCHAR(15) NOT NULL DEFAULT ("") AFTER `pref' . $after_col_num . '`,';
        $new_col_no++;
        $after_col_num++;
    }
    $sql = "ALTER TABLE student_preference_" . $type . substr($add_cols, 0, strlen($add_cols) - 1);
    mysqli_query($conn, $sql);
}
$upload_constraint = mysqli_escape_string($conn, $_POST['upload_constraint']);

$args = '["' . $target_location . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $sem . '","' . $year . '","' . $form_id . '","' . $upload_constraint . '","' . $status . '","' . $npre . '","' . $rno . '","' . $email . '","' . $tstamp;
for ($i = 1; $i <= $total_pref; $i++) {
    $args .= '","' . $npref[$i];
}
$args .= '"]';
// echo $args;
$cmd = 'python student_preference.py ' . $args;
// echo $cmd;
$output = shell_exec($cmd . " 2>&1");
echo $output;

exit();
