<?php
session_start();
include("dbconfig.php");
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
if($file!=null)
{
$cap=$_POST["caption"];
$sql = "insert into post(username,img,caption) values ('".$_SESSION["username"]."','$file','$cap')";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("User Inserted");</script>';
	header('location: welcome.php');
} else {
	$_SESSION['errMsg'] = "try again later"."<br>".$sql."<br>". $conn->error;
	echo $_SESSION['errMsg'];
}
}
else
{
	echo '<script type="text/javascript">
		alert("Please Select Image");
	</script>';
	header('location: addpost.php');
}

$conn->close();
?>