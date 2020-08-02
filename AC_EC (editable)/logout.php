<?php
session_start();
include_once("config.php");
include_once("Logger/UserLogger.php");
$logger = UserLogger::getLogger();
$logger->logout($_SESSION['email']);
session_destroy();
header("Location: index.php");
