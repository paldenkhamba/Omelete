<?php
session_start();
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['isloggedin']);
header('location:login.php');
?>