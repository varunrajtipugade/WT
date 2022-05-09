<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Snapbook</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/sc.css" rel="stylesheet" type="text/css" />
<link href="css/varun_sc.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/card2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="img/webicon.png"/>
</head>
<body>
<div class="main1">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="#"><span style="font-size: 48px;">Snapbook</span><small>from V7</small></a></h1>
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
          <li class="active1"><a href="welcome.php">Home</a></li>
          <li><a href="addpost.php">Add Post</a></li>
          <li><a href="edit.php">Edit Profile</a></li>
          <li><a href="u.php">My Profile</a></li>
          <li><a href="setting.php">Settings</a></li>
          <li><a href="about.php">About</a></li>
        </ul>

        <div class="clr"></div>


      </div>      
      <div class="hbg"><img src="images/scb.jpg" width="923" height="450" alt="" /></div>
    </div>

  <?php

include("dbconfig.php");

$sql = "select * from post order by srno DESC;";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
	while ($row =$result->fetch_assoc()) {
		echo '<div class="card">
  					<img id="uploaded" src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="600" height="600 alt="Avatar" style="width:100%">
  					<div class="container">
    					<h2><b>'.$row["username"].'</b></h2>
    					<p><h3>'.$row["caption"].'</h3></p>
              <i class="fa fa-heart-o" aria-hidden="true" style="font-size:36px;margin-right:15px;"></i>
              <i class="fa fa-comment-o" aria-hidden="true" style="font-size:36px;margin-right:15px;""></i>
              <i class="fa fa-share" aria-hidden="true" style="font-size:36px;margin-right:15px;""></i>
  					</div>
				</div>';
	}
	}
else {
   //echo "<tr><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td></tr>";
  //echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

$conn->close();
?>
<hr size="5" style="border: 0;
  height: 4px;
  background: #333;
  background-image: -webkit-linear-gradient(left, #CCEEFC, #3b5998, #CCEEFC);
  background-image: -moz-linear-gradient(left, #CCEEFC, #3b5998, #CCEEFC);
  background-image: -ms-linear-gradient(left, #CCEEFC, #3b5998, #CCEEFC);
  background-image: -o-linear-gradient(left, #CCEEFC, #3b5998, #CCEEFC);">
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c3">
        <a href="#"><img src="images/Picture1.png" width="100" height="100" alt="" style="border: 0" /></a>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>

<div class="footer">
  <div class="footer_resize">
    <p class="lf">&copy; Copyright <a href="#">All Rights Reserved Varunraj Tipugade Pvt.Ltd</a>.</p>
    <p class="rf">Layout by <a href="#">V7</a></p>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>