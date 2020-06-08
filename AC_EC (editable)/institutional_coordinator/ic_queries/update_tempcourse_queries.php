<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");

    if(isset($_POST['delete_course'])){
        $cid=mysqli_escape_string($conn,$_POST['cid']);
        // $sem=mysqli_escape_string($conn,$_POST['sem']);
        // $year=mysqli_escape_string($conn,$_POST['year']);
        if(isset($_POST['delete_course'])){
            $sql="DELETE FROM {$_SESSION['course_table']} WHERE cid='{$cid}' AND year='{$_SESSION['year']}' AND sem='{$_SESSION['sem']}'";
            $sql2="DELETE FROM {$_SESSION['course_allocate_info']} WHERE cid='{$cid}' AND year='{$_SESSION['year']}' AND sem='{$_SESSION['sem']}'";
        }
        // else if(isset($_POST['delete_course_log'])){
        //     $sql="DELETE FROM audit_course_log WHERE email_id='$email_id' AND sem='$sem' AND year='$year'";
        // }
        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql2);
        // header("Location: ../addcourse_ac.php");
        exit();
    }
    else if(isset($_POST['update_course'])){
        $cid=mysqli_escape_string($conn,$_POST['cid']);
        $max_new=mysqli_escape_string($conn,$_POST['max_new']);
        $min_new=mysqli_escape_string($conn,$_POST['min_new']);
        $sql="UPDATE {$_SESSION['course_table']} SET max='{$max_new}',min='{$min_new}' WHERE cid='{$cid}' AND sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}'";
            // $sql="UPDATE `student` SET `email_id`='ggg@somaiya.edu',`rollno`='1845121453451',`fname`='aset',`mname`='haeth',`lname`='haetheath'
            //,`year_of_admission`='2017',`current_sem`='3' WHERE `email_id`='gg@somaiya.edu' AND rollno='415231'";
            // $sql = "UPDATE `student` SET `dept_id`='$dept_id' WHERE `email_id`='gg@somaiya.edu'";
          // } 
        mysqli_query($conn,$sql);
        // header("Location: ../addcourse_ac.php");
        exit();
    }

}
?>