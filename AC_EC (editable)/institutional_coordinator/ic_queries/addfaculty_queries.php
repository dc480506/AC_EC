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

            // $results1 = mysqli_query($conn,"select email_id from faculty where email_id='$email'");
            // $results2 = mysqli_query($conn,"select faculty_code from faculty where faculty_code='$faculty_code'");
            // $results3 = mysqli_query($conn,"select employee_id from faculty where employee_id='$eid'");

            // if(mysqli_num_rows($results1) > 0){
            //     echo "<script> 
            //     $('#email_id_error').text('*This Email ID already exists');</script>";
            //     // echo '<span id="error_email_id" class="text-danger">This id exists</span>';
            //     // echo "Exists_email_id";
            // }else if(mysqli_num_rows($results2) > 0){
            //     echo "<script> 
            //     $('#email_faculty_code').text('*This faculty code already exists');</script>";
            //     // echo "Exists_faculty_code";
            // }else if(mysqli_num_rows($results3) > 0){
            //     echo "<script> 
            //     $('#email_employee_id').text('*This employee ID already exists');</script>";
            //     // echo "Exists_employee_id";
            // }
            // else{
            //     $sql="INSERT INTO faculty(`email_id`,`faculty_code`,`employee_id`, `fname`, `mname`, `lname`, `dept_id`, `post`, `username`,`added_by`,`timestamp`) VALUES ('$email','$faculty_code',$eid,'$names[0]','$names[1]','$names[2]','$dept_id', '$post', '$username','$added_by','$timestamp')";
            //     mysqli_query($conn,$sql) or die(mysqli_error($conn));
            // }
            header("Location: ../addfaculty_internal.php");
        
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
        $mname_new=mysqli_escape_string($conn,$_POST['mname_new']);
        $lname_new=mysqli_escape_string($conn,$_POST['lname_new']);
        $email_id_new=mysqli_escape_string($conn,$_POST['email_id_new']);
        $email_id_old=mysqli_escape_string($conn,$_POST['email_id_old']);
        $faculty_code_new=mysqli_escape_string($conn,$_POST['faculty_code_new']);
        $faculty_code_old=mysqli_escape_string($conn,$_POST['faculty_code_old']);
        $employee_id_new=mysqli_escape_string($conn,$_POST['employee_id_new']);
        $employee_id_old=mysqli_escape_string($conn,$_POST['employee_id_old']);
        $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        $post_new=mysqli_escape_string($conn,$_POST['post_new']);
        if($email_id_new != $email_id_old){
            // $query = "SELECT `email_id` FROM `faculty` WHERE `email_id`='$email_id_new'";
            $results = mysqli_query($conn,"select email_id from faculty where email_id='$email_id_new'");
            if(mysqli_num_rows($results) > 0){
                // echo "<script> 
                // console.log(".$email_id_new.")
                // $('#email_id_error').text('Sorry....This Email ID already exists');</script>";
                echo "Exists_email_id";
            }else{
                $sql="UPDATE `faculty` SET `email_id`='$email_id_new',`faculty_code`='$faculty_code_new',`employee_id`='$employee_id_new',`fname`='$fname_new',
                `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
                WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
                mysqli_query($conn,$sql);
                // header("Location: ../addfaculty_internal.php");
                exit();    
            }
        }
        else if ($faculty_code_new != $faculty_code_old){
            $results = mysqli_query($conn,"select faculty_code from faculty where faculty_code='$faculty_code_new'");
            if(mysqli_num_rows($results) > 0){
                // echo "<script> 
                // console.log(".$email_id_new.")
                // $('#email_id_error').text('Sorry....This Email ID already exists');</script>";
                echo "Exists_faculty_code";
            }else{
                $sql="UPDATE `faculty` SET `email_id`='$email_id_new',`faculty_code`='$faculty_code_new',`employee_id`='$employee_id_new',`fname`='$fname_new',
                `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
                WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
                mysqli_query($conn,$sql);
                // header("Location: ../addfaculty_internal.php");
                exit();    
            }
        }
        else if ($employee_id_new != $employee_id_old){
            $results = mysqli_query($conn,"select employee_id from faculty where employee_id='$employee_id_new'");
            if(mysqli_num_rows($results) > 0){
                // echo "<script> 
                // console.log(".$email_id_new.")
                // $('#email_id_error').text('Sorry....This Email ID already exists');</script>";
                echo "Exists_employee_id";
            }else{
                $sql="UPDATE `faculty` SET `email_id`='$email_id_new',`faculty_code`='$faculty_code_new',`employee_id`='$employee_id_new',`fname`='$fname_new',
                `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
                WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
                mysqli_query($conn,$sql);
                // header("Location: ../addfaculty_internal.php");
                exit();    
            }
        }
        else{
            $sql="UPDATE `faculty` SET `email_id`='$email_id_new',`faculty_code`='$faculty_code_new',`employee_id`='$employee_id_new',`fname`='$fname_new',
            `mname`='$mname_new',`lname`='$lname_new',`dept_id`='$dept_id',`post`='$post_new'
            WHERE `email_id`='$email_id_old' AND `faculty_code`='$faculty_code_old'";
            mysqli_query($conn,$sql);
            // header("Location: ../addfaculty_internal.php");
            exit();
        } 
    }
    // header("Location: ../addfaculty_internal.php");

}
?>