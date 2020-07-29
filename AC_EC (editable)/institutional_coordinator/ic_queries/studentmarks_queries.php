
<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == "inst_coor") {
  include_once("../../config.php");
  include_once("../../Logger/StudentLogger.php");
  $logger = StudentLogger::getLogger();

  if (isset($_POST['delete_student_marks'])) {
    $email_id = mysqli_escape_string($conn, $_POST['email_id']);
    $sem = mysqli_escape_string($conn, $_POST['sem']);
    $year = mysqli_escape_string($conn, $_POST['year']);

    $sql = "DELETE FROM student_marks WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
    mysqli_query($conn, $sql);
    $logger->studentMarksDeleted($_SESSION['email'], $email_id);
    echo $sql;
  } else if (isset($_POST['update_marks'])) {
    $email_id = mysqli_escape_string($conn, $_POST['email_id_student']);
    $semold = mysqli_escape_string($conn, $_POST['semold']);
    $yearold = mysqli_escape_string($conn, $_POST['yearold']);
    $gpa = mysqli_escape_string($conn, $_POST['gpa']);
    $gpaold = mysqli_escape_string($conn, $_POST['gpaold']);
    $semnew = mysqli_escape_string($conn, $_POST['semnew']);
    $yearnew = mysqli_escape_string($conn, $_POST['yearnew']);



    if ($semold != $semnew) {
      $status = "update sem from $semold to $semnew for $email_id";
      $logger->studentMarksUpdated($_SESSION['email'], $email_id, $status);
    }
    if ($yearold != $yearnew) {
      $status = "update year from $yearold to $yearnew for $email_id";
      $logger->studentMarksUpdated($_SESSION['email'], $email_id, $status);
    }
    if ($gpaold != $gpa) {
      $status = "update GPA from $gpaold to $gpa for $email_id (sem-$semnew AY $yearnew)";
      $logger->studentMarksUpdated($_SESSION['email'], $email_id, $status);
    }

    $sql = "UPDATE `student_marks` SET `sem` = '$semnew', `gpa` = '$gpa', `year` = '$yearnew' WHERE `student_marks`.`email_id` = '$email_id' AND `student_marks`.`sem` = $semold AND `student_marks`.`year` = '$yearold'";
    mysqli_query($conn, $sql);
  }
}
?>