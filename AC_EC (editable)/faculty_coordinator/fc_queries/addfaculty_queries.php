<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="faculty_co"){
    include_once("../../config.php");
    //For Course deletion
    if(isset($_POST['delete_faculty'])){
        $email=mysqli_escape_string($conn,$_POST['email']);
//        $department=mysqli_escape_string($conn,$_POST['department']);
        $post=mysqli_escape_string($conn,$_POST['post']);

  //      $sql="SELECT dept_id FROM department WHERE dept_name='$department'";
       // $result=mysqli_query($conn,$sql);
        //$row=mysqli_fetch_assoc($result);
        $dept_id=$_SESSION['dept_id'];

        $sql="DELETE FROM faculty WHERE email_id='$email' AND dept_id='$dept_id' AND post='$post'";
        //echo $sql;
        mysqli_query($conn,$sql);
        header("Location: ../addfaculty.php");
        exit();
    }else if(isset($_POST['update_faculty'])){
        $name=mysqli_escape_string($conn,$_POST['name']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        //$department=mysqli_escape_string($conn,$_POST['dept']);
        $accomplishment=mysqli_escape_string($conn,$_POST['accomplishment']);
        $post=mysqli_escape_string($conn,$_POST['post']);
        
       //$sql="SELECT dept_id FROM department WHERE dept_name='$department'";
        //$result=mysqli_query($conn,$sql);
        //$row=mysqli_fetch_assoc($result);
        $dept_id=$_SESSION['dept_id'];

        $names=explode(" ",$name);

        $sql="UPDATE faculty SET fname='$names[0]',mname='$names[1]',lname='$names[2]',email_id='$email',dept_id='$dept_id',post='$post' WHERE email_id='$email'";
        mysqli_query($conn,$sql);
        $sql="UPDATE faculty_certification SET course_certified='$accomplishment' WHERE email_id='$email'";
        mysqli_query($conn,$sql);
        header("Location: ../addfaculty.php");
        exit();
    }else if(isset($_POST['add_faculty'])){
        $name=mysqli_escape_string($conn,$_POST['name']);
        $email=mysqli_escape_string($conn,$_POST['email']);
       // $dept_name=mysqli_escape_string($conn,$_POST['dept']);
        $accomplishment=mysqli_escape_string($conn,$_POST['accomplishment']);
        $post=mysqli_escape_string($conn,$_POST['post']);
        // echo $cname."<br>";
        // echo $cid."<br>";
        // echo $sem."<br>";
        // echo $year."<br>";
        // echo $max."<br>";
        // echo $min."<br>";
        // echo $prevcid."<br>";
        // echo $prevsem."<br>";
        // echo $prevyear."<br>";
       // $sql="SELECT dept_id FROM department WHERE dept_name='$dept_name'";
        //$result=mysqli_query($conn,$sql);
        //$row=mysqli_fetch_assoc($result);
        $dept_id=$_SESSION['dept_id'];
        // echo $dept_id;
        // $email=$_SESSION['email'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");

        $names=explode(" ",$name);

        $sql="SELECT username FROM login_role WHERE email_id='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $username=$row['username'];

        $sql="INSERT INTO faculty(`email_id`, `fname`, `mname`, `lname`, `dept_id`, `post`, `username`) VALUES ('$email','$names[0]','$names[1]','$names[2]','$dept_id', '$post', '$username')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $sql="INSERT INTO faculty_certification(`email_id`, `course_certified`) VALUES ('$email','$accomplishment')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../addfaculty.php");
    }
}
?>