<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    //For Course deletion
    if(isset($_POST['delete_faculty'])){
        $email=mysqli_escape_string($conn,$_POST['email']);
        $sql="DELETE FROM faculty WHERE email_id='$email'";
        echo $sql;
        mysqli_query($conn,$sql);
    }else if(isset($_POST['update_faculty'])){
        $name=mysqli_escape_string($conn,$_POST['name']);
        $newemail=mysqli_escape_string($conn,$_POST['newemail']);
        $oldemail=mysqli_escape_string($conn,$_POST['oldemail']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept']);
        $eid=mysqli_escape_string($conn,$_POST['eid']);
        $faculty_code=mysqli_escape_string($conn,$_POST['faculty_code']);
        $accomplishment=mysqli_escape_string($conn,$_POST['accomplishment']);
        $post=mysqli_escape_string($conn,$_POST['post']);
        $names=explode(" ",$name);

        $sql="UPDATE faculty SET fname='$names[0]',mname='$names[1]',lname='$names[2]',email_id='$newemail',faculty_code='$faculty_code',employee_id='$eid',dept_id='$dept_id',post='$post' WHERE email_id='$oldemail'";
        mysqli_query($conn,$sql);
    }else if(isset($_POST['add_faculty'])){
        $name=mysqli_escape_string($conn,$_POST['name']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept']);
        $post=mysqli_escape_string($conn,$_POST['post']);
        $faculty_code=mysqli_escape_string($conn,$_POST['faculty_code']);
        $eid=mysqli_escape_string($conn,$_POST['eid']);
        // $email=$_SESSION['email'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");

        $names=explode(" ",$name);
        $added_by=$_SESSION['email'];
        $sql="SELECT username FROM login_role WHERE email_id='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $username=$row['username'];

        $sql="INSERT INTO faculty(`email_id`,`faculty_code`,`employee_id`, `fname`, `mname`, `lname`, `dept_id`, `post`, `username`,`added_by`,`timestamp`) VALUES ('$email','$faculty_code',$eid,'$names[0]','$names[1]','$names[2]','$dept_id', '$post', '$username','$added_by','$timestamp')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

    }
    header("Location: ../addfaculty_internal.php");

}
?>