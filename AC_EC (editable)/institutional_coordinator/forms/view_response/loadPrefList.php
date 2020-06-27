<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"),true); 
$email_id=$data['email_id'];

?>