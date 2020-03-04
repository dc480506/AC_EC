<?php
session_start();
if(!isset($_SESSION['email'] )){
    header("Location: ../index.php");
    exit();
}elseif($_SESSION['role']!="inst_coor"){
    header("Location: ../index.php");
    exit();
}
?>