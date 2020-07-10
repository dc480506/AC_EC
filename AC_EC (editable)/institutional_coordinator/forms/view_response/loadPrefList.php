<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$email_id = $data['email_id'];

$currently_active = $data['currently_active'];
$nop = $data['nop'];
$form_id = $data['form_id'];
$course_type = $data['type'];
$preferences = "";
$i = 1;
for (; $i < $nop; $i++) {
    $preferences .= "pref" . $i . ",";
}

$course_type_sql = "select * from form_course_category_map where form_id='$form_id'";
$result = mysqli_query($conn, $course_type_sql);
$course_type_ids = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($course_type_ids, $row["course_type_id"]);
}
$preferences .= "pref" . $i;
if ($currently_active < 2) {
    $sql_course = "SELECT cname,cid FROM course WHERE course_type_id in ('" . implode("','", $course_type_ids) . "')";
    $sql_response = "SELECT " . $preferences . " FROM student_preferences 
                WHERE email_id='" . $email_id . "' AND form_id = '$form_id'";
} else {
    $sql_course = "SELECT cname,cid FROM course_log course_type_id in ('" . implode("','", $course_type_ids) . "')";
    $sql_response = "SELECT " . $preferences . " FROM student_preferences_log 
                WHERE email_id='" . $email_id . "' AND form_id = '$form_id'";
}
//Course Info
$result = mysqli_query($conn, $sql_course);
$courses = array();
while ($row = mysqli_fetch_assoc($result)) {
    $courses[$row['cid']] = $row['cname'];
}
//Preference
$result = mysqli_query($conn, $sql_response);
$row = mysqli_fetch_assoc($result);
// var_dump($row);
$preference_list = "";
for ($i = 1; $i <= $nop; $i++) {
    $cid = $row['pref' . $i];
    if (strpos($cid, "same") !== false) {
        $preference_list .= "<p><small>" . $i . ") <i>" . $cid . "</i></small></p>";
    } else {
        $preference_list .= "<p><small>" . $i . ") " . $courses[$cid] . " <i>(" . $cid . ")</i></small></p>";
    }
}
echo '
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="added_by"><b>Preference List: </b></label>
        ' . $preference_list . '
    </div>
</div>';
