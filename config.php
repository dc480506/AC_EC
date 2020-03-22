<?php
$servername="localhost";
$password="";
$username="root";
$dbname="ac_ec";
$port="3306";
$CLIENT_ID="444425785443-5mh44gn88jrf46t217t7i4m62r4ui1ro.apps.googleusercontent.com";
$google_api_path="C:\Users\meetb007\Desktop\Codes\google-api-php-client-2.4.0\\";
$conn = new mysqli($servername,$username,$password,$dbname,$port);
if($conn->connect_error)
{
	die("Connection: ".$conn->connect_error);
}