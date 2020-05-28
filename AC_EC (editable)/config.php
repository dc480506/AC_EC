<?php
$servername="localhost";
$password="";
$username="root";
$dbname="AC_EC";
$port="3306";
$CLIENT_ID="444425785443-5mh44gn88jrf46t217t7i4m62r4ui1ro.apps.googleusercontent.com";
$google_api_path="../../../google-api-php-client-2.4.0/";
$base_dir="D:/xampp/uploads/AC_EC\\";
$conn = new mysqli($servername,$username,$password,$dbname,$port);
$exclude_dept="6";
if($conn->connect_error)
{
	die("Connection: ".$conn->connect_error);
}?>