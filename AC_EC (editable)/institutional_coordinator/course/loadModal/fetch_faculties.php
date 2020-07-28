<?php
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once("../../../config.php");
    $output = '';
    $role_restriction = "1";
    $role_restriction = "1";
    if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
        $role_restriction = "dept_id ='{$_SESSION['dept_id']}'";
    }

    $sql = "SELECT * FROM faculty WHERE $role_restriction and (  faculty_code LIKE '%" . $_POST['search'] . "%' OR fname LIKE '%" . $_POST['search'] . "%' 
            OR mname LIKE '%" . $_POST['search'] . "%' OR lname LIKE '%" . $_POST['search'] . "%' AND email_id NOT IN " . $_POST['allocated'] . ")";
    $result = mysqli_query($conn, $sql);
    $output .= '<div class="border">';
    if (mysqli_num_rows($result) == 0) {
        $output .= '<input disabled type="button" class="option-selected form-control border rounded-0" value="No data found"></input>';
    }
    while ($row = mysqli_fetch_assoc($result)) {

        $output .= '<input type="hidden" name="email_id" id="email_id" value="' . $row['email_id'] . '"/>
        <input type="button" class="option-selected form-control border rounded-0" 
         value="' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' (' . $row['faculty_code'] . ')"></input>';
    }
    $output .= '</div>';
    echo $output;
}
