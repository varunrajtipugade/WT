<?php
session_start();
$user=$_SESSION["username"];
$pass=$_SESSION["password"];
if (isset($_POST["logout"])) {
	session_destroy();
	header('location: index.html');
}
if (isset($_POST["delete"])) {
include("dbconfig.php");
$sql = "delete from user where username='$user' and password='$pass';";
if ($conn->query($sql) === TRUE) {
    $sql = "delete from post where username='$user';";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("User deleted");</script>';
    session_destroy();
	header('location: index.html');
} else {
	$_SESSION['errMsg'] = "try again later"."<br>".$sql."<br>". $conn->error;
	echo $_SESSION['errMsg'];
}
} else {
	$_SESSION['errMsg'] = "try again later"."<br>".$sql."<br>". $conn->error;
	echo $_SESSION['errMsg'];
}
}
?>