<?php
  session_start();
  $allowed_roles=array("inst_coor" , "faculty_co" , "HOD");
if(isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)){
  include_once("../../config.php");
   if(isset($_POST['delete_student_marks'])) {
   	$email_id=mysqli_escape_string($conn,$_POST['email_id']);
    $sem=mysqli_escape_string($conn,$_POST['sem']);
    $year=mysqli_escape_string($conn,$_POST['year']);

    $sql="DELETE FROM student_marks WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
        mysqli_query($conn,$sql);
        echo $sql;
   }
else if(isset($_POST['update_marks'])) {
   	$email_id=mysqli_escape_string($conn,$_POST['email_id_student']);
    $semold=mysqli_escape_string($conn,$_POST['semold']);
    $yearold=mysqli_escape_string($conn,$_POST['yearold']);
    $gpa=mysqli_escape_string($conn,$_POST['gpa']);
    $semnew=mysqli_escape_string($conn,$_POST['semnew']);
    $yearnew=mysqli_escape_string($conn,$_POST['yearnew']);

    $sql = "UPDATE `student_marks` SET `sem` = '$semnew', `gpa` = '$gpa', `year` = '$yearnew' WHERE `student_marks`.`email_id` = '$email_id' AND `student_marks`.`sem` = $semold AND `student_marks`.`year` = '$yearold'";
    mysqli_query($conn,$sql);
   }
}
?>