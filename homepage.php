<?php
include_once 'config.php';
require_once $google_api_path.'vendor/autoload.php';
$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$id_token=$_POST['idtoken'];
$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $search="@somaiya.edu";
  if(!preg_match("/{$search}/i", $payload['email'])){
    header("Location: index.php?loginerror");
    exit();
   }
  session_start();
  $_SESSION['email']=$payload['email'];
  $sql="SELECT * FROM login_role WHERE email_id= '{$_SESSION['email']}' ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
      if($count==1)
      {
        $_SESSION['username']=$row['username'];
        $_SESSION['role']=$row['role'];
        if($row['role']=='student')
          header("location: student/index.php");
        else if($row['role']=='faculty')
          header("location: faculty/index.php");
        else if($row['role']=='faculty_co')
          header("location: faculty_coordinator/index.php");
        else if($row['role']=='inst_coor')
          header("location: institutional_coordinator/index.php");
        else 
          echo"<script>
        alert('tera role banaya nahi hai enjoy!!!!!!!!!!!');
        windows.href.location='index.php';
        </script>";
      } 
} else {
  // Invalid ID token
  header("index.php");
}
