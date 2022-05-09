<?php
session_start();
include("dbconfig.php");
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
if ($file!=null) 
{
	$sql = "update user set name='".$_POST["name"]."',bio='".$_POST["bio"]."',address='".$_POST["address"]."',mob='".$_POST["mob"]."',email='".$_POST["email"]."',profile='$file' where username='".$_SESSION["username"]."'";
}
else
{
	$sql = "update user set name='".$_POST["name"]."',bio='".$_POST["bio"]."',address='".$_POST["address"]."',mob='".$_POST["mob"]."',email='".$_POST["email"]."' where username='".$_SESSION["username"]."'";
}
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("User Inserted");</script>';
	header('location: welcome.php');
} else {
	$_SESSION['errMsg'] = "try again later"."<br>".$sql."<br>". $conn->error;
	echo $_SESSION['errMsg'];
}

$conn->close();
?>