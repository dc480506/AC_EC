<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$table = "student_form";

$form_id = $data['form_id'];
if ($data['currently_active'] >= 2) {
    $table .= "_log";
}
$sql = "SELECT COUNT(*) as expected FROM $table WHERE form_id='$form_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$expectedResponses = $row['expected'];
$sql = "SELECT COUNT(*) as collected FROM $table  WHERE form_id='$form_id' and form_filled=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$collected = $row['collected'];
$remaining = $expectedResponses - $collected;
echo '
    <div class="row align-items-center">
        <div class="col text-left">
            <h6 class="font-weight-bold text-dark mb-0">
                Total Responses Expected: ' . $expectedResponses . '
            </h6>
        </div>
        <div class="col text-left">
            <h6 class="font-weight-bold text-success mb-0">
                No. of Students Filled: ' . $collected . ' (' . round($collected * 100 / $expectedResponses, 2) . '%)
            </h6>
        </div>
        <div class="col text-left">
            <h6 class="font-weight-bold text-danger mb-0">
                No. of Students Not Filled: ' . $remaining . ' (' . round($remaining * 100 / $expectedResponses, 2) . '%)
            </h6>
        </div>
    </div>
    ';
