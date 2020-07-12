<?php
include_once('../verify.php');
include_once('../../config.php');
include_once('../utils/zipArchive.php');


// {"username":"IC","email":"IC@somaiya.edu","role":"inst_coor","cid":"2UST511","active":0,"type":"temp",
//     "form_id":"9","program":"UG","form_course_type_ids":["3"],"algorithm_chosen":"previous_sem_marks","sem":"5",
//     "year":"2020-21","no_of_preferences":"8","course_table":"f1094e_course",
//     "course_app_dept_table":"f1094e_course_app_dept",
//     "student_pref":"f1094e_student_pref","student_course_table":"f1094e_student_course_alloted",
//     "course_allocate_info":"f1094e_course_info","pref_percent_table":"f1094e_pref_percent",
//     "pref_student_alloted_table":"f1094e_pref_student_alloted"}

$args = '["' . $_SESSION['sem'] . '","' . $_SESSION['year'] . '","' . $_SESSION['student_pref'] . '","' . $_SESSION['student_course_table'] . '","' . $_SESSION['course_allocate_info'] . '","' . $_SESSION['course_table'] . '","' . $_SESSION['pref_percent_table'] . '","' . $_SESSION['pref_student_alloted_table'] . '","' . $_SESSION['course_app_dept_table'] . '","' . $_SESSION['no_of_preferences'] . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $_SESSION['program'] . '","' . $_SESSION['form_id'] . '","' . $base_dir . ' "]';
$cmd = 'python ./result_gen.py ' . $args;
$output = shell_exec($cmd . " 2>&1");
// echo $output;
$filepath = explode("+", $output)[1];
$filepath = substr($filepath, 0, strlen($filepath) - 1);
$zipPath = $filepath . ".zip";
// echo $filepath;
new GoodZipArchive($filepath, $zipPath);
// $unallocated_query = "SELECT * FROM {$_SESSION['student_pref']} WHERE email_id not in (select email_id from {$_SESSION['student_course_table']})";

?>

<div class="tab-pane fade show active d-flex flex-column justify-content-center align-items-center py-5" id="nav-allocate-method" role="tabpanel" aria-labelledby="nav-allocate-method-tab">
    <h2>The allocation process is complete.</h2>
    <h6>Click Download to get the allocation reports</h6>

    <a href="download_reports.php?path=<?php echo urlencode(substr($zipPath, strlen($base_dir))); ?>" class=" btn btn-primary align-center" style="background-color: #28a745;border-color:#28a745">Download Reports</a>

    <a disabled href="../../" class="btn btn-link text-primary"><u>Go back to portal</u></a>

</div>
<script>
    $("#cancel_allocation").hide();
</script>
<?php
if (isset($_SESSION['course_table'])) {
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['course_table']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['course_app_dept_table']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['student_course_table']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['student_pref']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['course_allocate_info']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['pref_percent_table']) . "`";
    mysqli_query($conn, "DROP TABLE `" . $_SESSION['pref_student_alloted_table']) . "`";
}
?>