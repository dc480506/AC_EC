<?php
 ignore_user_abort(true);
 include_once('../verify.php');
 include_once('../../config.php');
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['student_course_table'])."`";
 unset($_SESSION['sem']);
 unset($_SESSION['year']);
 unset($_SESSION['no']);
 unset($_SESSION['no_of_preferences']);
 unset($_SESSION['course_table']);
 unset($_SESSION['student_course_table']);
?>