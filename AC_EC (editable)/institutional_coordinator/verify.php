<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
} elseif ($_SESSION['role'] != "inst_coor" && $_SESSION['role'] != "faculty_co" && $_SESSION['role'] != "hod") {
    header("Location: ../index.php");
    exit();
}
