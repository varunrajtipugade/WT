<?php
session_start();
$user=$_SESSION["username"];
include("dbconfig.php");
$pass;
// change password
$sql = "select password from user where username='$user';";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
	while ($row =$result->fetch_assoc()) {
		$pass=$row["password"];
	}
} 
else {
	$_SESSION['errMsg'] = "wrong password entered";
	header('location: changepass.php');
}


if($_POST["password2"]===$_POST["password3"] && $_POST["password1"]===$pass )
{
$sql = "update user set password='".$_POST["password3"]."' where password='".$_POST["password1"]."' and username='$user';";
if ($conn->query($sql) === TRUE) 
{
	$_SESSION['errMsg'] = "Password changed successfully ";
	$_SESSION["password"]=$_POST["password3"];
	header('location: welcome.php');
} else {
	$_SESSION['errMsg'] = "wrong password entered";
	header('location: setting.php');
}	
}
else
{
	$_SESSION['errMsg'] = "wrong password entered";
	header('location: setting.php');
}


$conn->close();
?>