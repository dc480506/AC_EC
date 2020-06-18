<?php
 ignore_user_abort(true);
 include_once('../verify.php');
 include_once('../../config.php');
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_app_dept_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['student_course_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['student_pref'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_allocate_info'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['pref_percent_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['pref_student_alloted_table'])."`";
 mysqli_query($conn,"DELETE FROM delete_temp_tables WHERE table_name IN ('".$_SESSION['course_table']."','".$_SESSION['course_app_dept_table']."','".$_SESSION['student_course_table']."','".$_SESSION['student_pref']."',
       '".$_SESSION['course_allocate_info']."','".$_SESSION['pref_percent_table']."',,'".$_SESSION['pref_student_alloted_table']."')");
 unset($_SESSION['sem']);
 unset($_SESSION['year']);
 unset($_SESSION['no']);
 unset($_SESSION['no_of_preferences']);
 unset($_SESSION['course_table']);
 unset($_SESSION['course_app_dept_table']);
 unset($_SESSION['student_course_table']);
 unset($_SESSION['student_pref']);
 unset($_SESSION['course_allocate_info']);
 unset($_SESSION['pref_percent_table']);
 unset($_SESSION['pref_student_alloted_table']);
?>
