<?php
//echo "its not in";
include_once('config.php');
if(isset($_POST['submit']))
{
	  $login_user = mysqli_real_escape_string($conn,$_POST['uname']);
      $Password = mysqli_real_escape_string($conn,$_POST['password']);
      echo $login_user;
      echo $Password;
      $sql="SELECT * FROM login_role where username='$login_user' AND password='$Password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      if($count==1)
      {
        session_start();
      	$_SESSION['username']=$login_user;
        $_SESSION['email']=$row['email_id'];
        if($row['role']=='student'){
            $_SESSION['role']='student';
            header("location: student/index.php");
            exit();
        }else if($row['role']=='faculty'){
            $_SESSION['role']='faculty';
              header("location: faculty/index.php");
              exit();
        }else if($row['role']=='faculty_co'){
            $_SESSION['role']='faculty_co';
            header("location: faculty_coordinator/index.php");
            exit();
        }else if($row['role']=='inst_coor'){
              $_SESSION['role']='inst_coor';
              header("location: institutional_coordinator/index.php");
              exit();
        }else 
      		echo"<script>
      				alert('tera role banaya nahi hai- enjoy!!!!!!!!!!!');
      				windows.href.location='index.php';
                  </script>";
        //   echo $_SESSION['username']."\n";
        //   echo $_SESSION['email']."\n";
        //   echo $_SESSION['role'];
      }
      else {
      	echo"<script>
      			alert('username or password incorrect');
      			windows.href.location(index.php);
      		</script>";
      }
}
