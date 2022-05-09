<?php
session_start();
$_SESSION["username"]=$_POST["Username"];
$_SESSION["password"]=$_POST["pass"];
header('location: userbio.php');
?>