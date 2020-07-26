
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__."./vendor/autoload.php";

class PHPMailerHelper{

// die("in php mailer");
    private $servername = "localhost";
    private $password = "";
    private $username = "root";
    private $dbname = "ac_ec";
    private $port = "3306";
    private $base_dir = "C:/xampp/uploads/AC_EC/";
    private $conn;
    public function __construct(){
        $mail = new PHPMailer();
        // die("hey");
        $this->conn = new mysqli($this->servername,$this->username, $this->password, $this->dbname, $this->port);
        try { 
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);           
            $mail->Username   = 'ijoglekar16@gmail.com';                  
            $mail->Password   = 'Ish@1301';                                          
            $mail->Username   = 'ijoglekar16@gmail.com';                  
            $mail->Password   = 'Ish@1301';                         
            $mail->Port       = 465;    
                    
        } catch (Exception $e) { 
            die("Hey i am in catch");   
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
        } 
        $this->mail = $mail;
        
    }
    
   
    public function sendEmail(){
        // die("hey");
        
        while(true){
            $query = "select * from email_queue where email_sent = 0 limit 10 ";
            $result = mysqli_query($this->conn,$query);
            
            $mail = $this->mail;

            if($result->num_rows > 0){
                $base_dir = "C:/xampp/uploads/AC_EC/";
                while($row = mysqli_fetch_array($result)){          
                    
                    $mail->clearAllRecipients();
                    $mail->clearAttachments();

                    $mail->setFrom('isha.joglekar@somaiya.edu', 'KJSCE'); 
                    $mail->addAddress(strval($row['to_email']));
                    $mail->Subject = "Test Email";
                    $mail->Body = strval($row['body']);
                    if($row['attachment_location'] != ''){
                        $mail->addAttachment($base_dir.$row['attachment_location']);   
                    }
                    // die($mail->send());
                    if($mail->send())
                    {
                        echo "Successfully Sent the email";
                        $updateQuery  = "Update email_queue set email_sent = 1 where id =  {$row['id']}";
                        $this->conn->query($updateQuery);

                        // Util::redirect("dashboard/blank.php");
                    }
                    else
                    {
                        echo "Error";
                        // Util::redirect("dashboard/forgot-password.php");
                    }
                }
            }else{
                 break;
            }
        
        }
    }

}

$myMail = new PHPMailerHelper();
$myMail->sendEmail();


