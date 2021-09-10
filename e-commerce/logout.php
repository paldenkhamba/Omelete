<?php
session_start();
unset($_SESSION['first_name']);
unset($_SESSION['isloggedin']);
session_destroy();

header('location:signin.php');
?>