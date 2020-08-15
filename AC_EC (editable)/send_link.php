<?php
include_once 'config.php';
require_once $google_api_path.'vendor/autoload.php';
if(isset($_POST['submit_email']) && $_POST['email_id'])
{
 $query="SELECT email_id , password from login_role where email_id='$email_id'";
 if($result= mysqli_query($conn,$query))
 {
     $rowcount =mysqli_query($conn,$query);
  if($rowcount == 1)
  {
    while($row=mysqli_fetch_array($result))
    {
      $email_id=md5($row['email_id']);
      $password=md5($row['password']);
    }
    $link="<a href='reset.php?key=".$email."&reset=".$password."'>Click To Reset password</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "your_email_id@gmail.com";
    // GMAIL password
    $mail->Password = "your_gmail_password";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='your_gmail_id@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('reciever_email_id', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$password.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
}
?>