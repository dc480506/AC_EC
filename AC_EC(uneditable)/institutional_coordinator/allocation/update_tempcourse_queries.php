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
        $sem=$_SESSION['sem'];
        $year=$_SESSION['year'];
        $sql="UPDATE {$_SESSION['course_table']} SET max='{$max_new}',min='{$min_new}' WHERE cid='{$cid}' AND sem='{$sem}' and year='{$year}'";
            // $sql="UPDATE `student` SET `email_id`='ggg@somaiya.edu',`rollno`='1845121453451',`fname`='aset',`mname`='haeth',`lname`='haetheath'
            //,`year_of_admission`='2017',`current_sem`='3' WHERE `email_id`='gg@somaiya.edu' AND rollno='415231'";
            // $sql = "UPDATE `student` SET `dept_id`='$dept_id' WHERE `email_id`='gg@somaiya.edu'";
          // } 
        mysqli_query($conn,$sql);
        $sql="SELECT dept_id FROM {$_SESSION['course_app_dept_table']} WHERE cid='{$cid}' AND sem='{$sem}' AND year='{$year}'";
        $result=mysqli_query($conn,$sql);
        $delete_dept=array();
        $insert_dept=array();
        $row_dept=array();
        
        while($row=mysqli_fetch_assoc($result)){
            // if(!in_array($row['dept_id'],$_POST['check_dept'])){
            //     array_push($delete_dept,$row['dept_id']);
            // }
            array_push($row_dept,$row['dept_id']);
        }
        // foreach($row_dept as $d){
        //     echo'<p>'.$d.'</p>';
        // }
        foreach($row_dept as $r){
            if(!in_array($r,$_POST['check_dept'])){
                array_push($delete_dept,$r);
            }
        }
        // foreach($delete_dept as $d){
        //     echo 'Delete<p>'.$d.'</p>';
        // }
        // echo '<br>';
        foreach($_POST['check_dept'] as $r){
            if(!in_array($r,$row_dept)){
                array_push($insert_dept,$r);
            }
        }
        // foreach($insert_dept as $d){
        //     echo 'Insert <p>'.$d.'</p>';
        // }
        // echo '<br>';
        // foreach($delete_dept as $r){
        //     echo $r;
        // }
        
        if(!empty($delete_dept)){
            $s="(";
            foreach($delete_dept as $r){
                $s.="$r,";
            }
            $s=substr($s,0,strlen($s)-1);
            $s.=")";
            $sql="DELETE FROM {$_SESSION['course_app_dept_table']} WHERE cid='$cid' AND sem='$sem' AND year='$year' AND dept_id IN $s";
                // echo $sql;
            mysqli_query($conn,$sql);
        }
        if(!empty($insert_dept)){
            $Values="";
            foreach($insert_dept as $u){
            $Values.="('$cid','$sem','$year','$u'),";
            }
            $sql="INSERT INTO {$_SESSION['course_app_dept_table']} VALUES ".substr($Values,0,strlen($Values)-1);
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
        }
        exit();
    }

}
?>