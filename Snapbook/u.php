<?php
session_start();
$user=$_SESSION["username"];
$pass=$_SESSION["password"];
?>
<html>
<head>
	<title>Snapbook</title>

	<!-- icon-->
    <link rel="shortcut icon" href="img_bollywood/webicon.png" type="image/x-icon">
    <link href="css/sc2.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="img/webicon.png"/>
	<!-- CSS Files -->
    <link rel="stylesheet" href="css/st.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body background="img_bollywood/last.jpg">
<div class="main1">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="#"><span style="font-size: 48px;">Snapbook</span><small style="color: white;">from V7</small></a></h1>
      </div>
      <div class="search">
        <form method="post" id="search" action="search.php">
          <span>
          <input type="text" placeholder="Search..." name="s" id="s" />
          <input name="searchsubmit" type="image" src="images/search1.gif" value="Go" id="searchsubmit" class="btn"  />
          </span>
        </form>
        <!--/searchform -->
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="welcome.php">Home</a></li>
          <li><a href="addpost.php">Add Post</a></li>
          <li><a href="edit.php">Edit Profile</a></li>
          <li class="active1"><a href="u.php">My Profile</a></li>
          <li><a href="setting.php">Settings</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
        <div class="clr"></div>
      </div>     
    </div>

<?php
include("dbconfig.php");
$sql = "select * from user where username='$user' and password='$pass';";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
	$row =$result->fetch_assoc();
	echo '
        	
	<div class="main">
	<div class="wrap">
	<div class="profile">

<img id="profilepic" src="data:image/jpeg;base64,'.base64_encode($row['profile']).'"/>	
			<div class="info">
					<b><h1>'.$row["username"].'</b></h1>
					<hr size="5" class="hrcricket">
				
					<table>
				<tr><td><b>Name:</b></td></tr>
					<tr><td>'.$row["name"].'</td></tr>
					<tr><td></td></tr>

				<tr><td><b>Bio:</b></td></tr>
					<tr><td><textarea readonly="readonly" style="border: 0" rows="7" col="20">'.$row["bio"].'</textarea></td></tr>
					<tr><td></td></tr>

				<tr><td><b>Address:</b></td></tr>
					<tr><td><textarea readonly="readonly" style="border: 0" rows="7" col="20">'.$row["address"].'</textarea></td></tr>
					<tr><td></td></tr>
				
				<tr><td><b>Mob.no:</b></td></tr>
					<tr><td>'.$row["mob"].'</td><br>
				</tr>
				<tr><td></td></tr>

				<tr><td><b>Email:</b></td></tr>
					<tr><td>'.$row["email"].'</td></tr>
					<tr><td></td></tr>
			</table>
			</div> 
		</div>	
</div>
</div>
        ';
} else {
   echo "<tr><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td></tr>";
   echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

?>

<?php
$user=$_SESSION["username"];
$pass=$_SESSION["password"];

include("dbconfig.php");

$sql = "select * from post where username='$user' order by srno DESC;";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
	while ($row =$result->fetch_assoc()) {
      echo '<div class="card">
            <img id="uploaded" src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="300" height="300 alt="Avatar" style="width:100%">
            <div class="container">
    					<h3><b>'.$row["username"].'</b></h3>
    					<p>'.$row["caption"].'</p>
  					</div>
				</div>';
	}
	}
else {
  
   echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

$conn->close();
?>
           

</body>
</html>