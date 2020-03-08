<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    //For Course deletion
    if(isset($_POST['delete_course'])){
        $cid=mysqli_escape_string($conn,$_POST['cid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $sql="DELETE FROM audit_course WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        echo $sql;
        mysqli_query($conn,$sql);
        header("Location: ../addcourse.php");
        exit();
    }else if(isset($_POST['update_course'])){
        $cname=mysqli_escape_string($conn,$_POST['coursename']);
        $cidnew=mysqli_escape_string($conn,$_POST['courseidnew']);
        $cidold=mysqli_escape_string($conn,$_POST['courseidold']);
        $semnew=mysqli_escape_string($conn,$_POST['semnew']);
        $semold=mysqli_escape_string($conn,$_POST['semold']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        $sql="UPDATE audit_course SET cname='$cname',cid='$cidnew',sem='$semnew',min='$min',max='$max' WHERE cid='$cidold' 
        AND sem='$semold' AND year='$year'";
        mysqli_query($conn,$sql);
        header("Location: ../addcourse.php");
        exit();
    }else if(isset($_POST['add_course'])){
        $cname=mysqli_escape_string($conn,$_POST['cname']);
        $cid=mysqli_escape_string($conn,$_POST['courseid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dept_name=mysqli_escape_string($conn,$_POST['dept']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        if(isset($_POST['map_cbox'])){
            $prevcid=mysqli_escape_string($conn,$_POST['prevcid']);
            $prevsem=mysqli_escape_string($conn,$_POST['prevsem']);
            $prevyear=mysqli_escape_string($conn,$_POST['prevyear']);
        }
        // echo $cname."<br>";
        // echo $cid."<br>";
        // echo $sem."<br>";
        // echo $year."<br>";
        // echo $max."<br>";
        // echo $min."<br>";
        // echo $prevcid."<br>";
        // echo $prevsem."<br>";
        // echo $prevyear."<br>";
        $sql="SELECT dept_id FROM department WHERE dept_name='$dept_name'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $dept_id=$row['dept_id'];
        echo $dept_id;
        $email=$_SESSION['email'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $sql="INSERT INTO audit_course(`cid`,`sem`,`year`,`cname`,`dept_id`,`min`,`max`,`email_id`,`timestamp`) VALUES('$cid','$sem','$year','$cname','$dept_id','$min','$max','$email','$timestamp')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../addcourse.php");
    }
}
?>