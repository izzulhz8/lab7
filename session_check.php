<?php
session_start();

if (!isset($_SESSION['matric'])) {
    // User not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
