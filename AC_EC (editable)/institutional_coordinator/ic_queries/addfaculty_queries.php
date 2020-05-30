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
    else if(isset($_POST['delete_internal_faculty'])){
        $email_id=mysqli_escape_string($conn,$_POST['email_id']);
            $sql="DELETE FROM faculty WHERE email_id='$email_id'";
        mysqli_query($conn,$sql);
        // header("Location: ../addcourse_ac.php");
        exit();
    }
    else if(isset($_POST['update_internal_faculty'])){
        $fname_new=mysqli_escape_string($conn,$_POST['fname_new']);
        $fname_old=mysqli_escape_string($conn,$_POST['fname_old']);
        $mname_new=mysqli_escape_string($conn,$_POST['mname_new']);
        $mname_old=mysqli_escape_string($conn,$_POST['mname_old']);
        $lname_new=mysqli_escape_string($conn,$_POST['lname_new']);
        $lname_old=mysqli_escape_string($conn,$_POST['lname_old']);
        $email_id_new=mysqli_escape_string($conn,$_POST['email_id_new']);
        $email_id_old=mysqli_escape_string($conn,$_POST['email_id_old']);
        $faculty_code_new=mysqli_escape_string($conn,$_POST['faculty_code_new']);
        $faculty_code_old=mysqli_escape_string($conn,$_POST['faculty_code_old']);
        $employee_id_new=mysqli_escape_string($conn,$_POST['employee_id_new']);
        $employee_id_old=mysqli_escape_string($conn,$_POST['employee_id_old']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        // $dept_name_old=mysqli_escape_string($conn,$_POST['dept_name_old']);
        $post_new=mysqli_escape_string($conn,$_POST['post_new']);
        $post_old=mysqli_escape_string($conn,$_POST['post_old']);                                
        // $year=mysqli_escape_string($conn,$_POST['year']);
        // $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        // $sql="SELECT dept_id FROM department WHERE dept_name='$dept_name_new'";
        // $result= mysqli_query($conn,$sql);
        // $row1 = mysqli_fetch_array($result);
        // $dept_id=$row1['dept_id'];
        // $name=explode(" ",$fname_new);
        // echo $name[0];
        // $fname=$name[0];
        // $mname=$name[1];
        // $lname=$name[2];
        // if(isset($_POST['update_internal_faculty'])){
            $sql="UPDATE `faculty` SET `email_id`='$email_id_new',`faculty_code`='$faculty_code_new',`employee_id`='$employee_id_new',`fname`='$fname_new',
            `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
            WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
            // $sql="UPDATE `faculty` SET `email_id`='',`faculty_code`='$faculty_code_new',`employe_id`='$employe_id_new',`fname`='$fname_new',
            // `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
            // WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
            // $sql = "UPDATE `faculty` SET `dept_id`='$dept_id' WHERE `email_id`='gg@somaiya.edu'";
            // } 
        mysqli_query($conn,$sql);
        // header("Location: ../addfaculty_internal.php");
        exit();
    }
    header("Location: ../addfaculty_internal.php");

}
?>