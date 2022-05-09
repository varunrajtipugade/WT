<?php
session_start();
include("dbconfig.php");
$e=$_POST["email"];
$p=$_POST["MobileNumber"];
$l=strlen($p);

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && $l==10 && !empty($_POST['name'])) 
{
	$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$sql = "insert into user(username,password,name,bio,address,mob,email,profile) values ('".$_SESSION["username"]."','".$_SESSION["password"]."','".$_POST["name"]."','".$_POST["bio"]."','".$_POST["address"]."','".$_POST["MobileNumber"]."','".$_POST["email"]."','$file')";
	if ($conn->query($sql) === TRUE) 
	{
    echo '<script type="text/javascript">alert("User Inserted");</script>';
	header('location: welcome.php');
	} else 
	{
	$_SESSION['errMsg'] = "try again later"."<br>".$sql."<br>". $conn->error;
	echo $_SESSION['errMsg'];
	}
}
else
{
	header('location: userbio.php');
}
$conn->close();
?>