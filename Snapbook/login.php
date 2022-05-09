<?php
session_start();
$_SESSION["username"]=$_POST["Username"];
$_SESSION["password"]=$_POST["pass"];

$user=$_POST["Username"];
$pass=$_POST["pass"];

include("dbconfig.php");
$sql = "select * from user where username='$user' and password='$pass';";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
   header('location: welcome.php');
} else {
	header('location: index.html');
   echo "<tr><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td></tr>";
   echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

$conn->close();
?>