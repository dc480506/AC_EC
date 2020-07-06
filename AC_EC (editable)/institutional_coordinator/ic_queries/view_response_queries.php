<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == "inst_coor") {
    include_once("../../config.php");
    if (isset($_POST['save_changes'])) {
        $rollno = mysqli_escape_string($conn, $_POST['rollno']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        // $email_id=mysqli_escape_string($conn,$_POST['email_id']);
        $year = mysqli_escape_string($conn, $_POST['year']);
        $allocate_status = mysqli_escape_string($conn, $_POST['allocate_status']);
        $output = shell_exec($cmd);
        header("Location: ../audit_view.php");
        exit();
    } else if (isset($_POST['delete_response'])) {
        $email_id = mysqli_escape_string($conn, $_POST['email_id']);
        $sem = mysqli_escape_string($conn, $_POST['sem']);
        $year = mysqli_escape_string($conn, $_POST['year']);
        $no=mysqli_escape_string($conn,$_POST['no']);
        $currently_active=mysqli_escape_string($conn,$_POST['currently_active']);
        $course_type=mysqli_escape_string($conn,$_POST['type']);
        if($currently_active<2){
            $sql_del = "DELETE FROM student_preference_".$course_type." WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
            $sql_stu_form_update="UPDATE student_form SET form_filled=0 WHERE email_id='".$email_id."' AND year='".$year."' AND sem='".$sem."'
            AND form_type='".$course_type."' AND no='".$no."'";
        }else{
            $sql_del = "DELETE FROM student_preference_".$course_type."_log WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
            $sql_stu_form_update="UPDATE student_form_log SET form_filled=0 WHERE email_id='".$email_id."' AND year='".$year."' AND sem='".$sem."'
            AND form_type='".$course_type."' AND no='".$no."'";
        }
        mysqli_autocommit($conn,FALSE);
        mysqli_query($conn, $sql_del) or die (mysqli_error($conn));
        mysqli_query($conn, $sql_stu_form_update) or die (mysqli_error($conn));
        if(!mysqli_commit($conn)){
            die(mysqli_error($conn));
        }
        mysqli_close($conn);
        exit();
    } else if (isset($_POST['update_response'])) {
        $rollno_new = mysqli_escape_string($conn, $_POST['rollno_new']);
        $rollno_old = mysqli_escape_string($conn, $_POST['rollno_old']);
        $year_new = mysqli_escape_string($conn, $_POST['year_new']);
        $year_old = mysqli_escape_string($conn, $_POST['year_old']);
        $sem_new = mysqli_escape_string($conn, $_POST['sem_new']);
        $sem_old = mysqli_escape_string($conn, $_POST['sem_old']);
        $allocate_status_new = mysqli_escape_string($conn, $_POST['allocate_status_new']);
        $allocate_status_old = mysqli_escape_string($conn, $_POST['allocate_status_old']);
        if ($rollno_new != $rollno_old) {
            $results = mysqli_query($conn, "Select rollno from student_preference_audit WHERE rollno = '$rollno_new'");
            if (mysqli_num_rows($results) > 0) {
                echo "Exists";
            } else {
                $sql = "UPDATE `student_preference_audit` SET `rollno`='$rollno_new',`sem`='$sem_new',`year`='$year_new'
        ,`allocate_status`='$allocate_status_new' WHERE `rollno`='$rollno_old'";
                mysqli_query($conn, $sql);
                exit();
            }
        } else {
            $sql = "UPDATE `student_preference_audit` SET `rollno`='$rollno_new',`sem`='$sem_new',`year`='$year_new'
        ,`allocate_status`='$allocate_status_new' WHERE `rollno`='$rollno_old'";
            mysqli_query($conn, $sql);
            exit();
        }
    }
}
