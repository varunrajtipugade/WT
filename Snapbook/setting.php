<?php
session_start();
$user=$_SESSION["username"];
$pass=$_SESSION["password"];
?>
<html>
<head>
    <title>Snapbook</title>

    <!-- icon-->
   <link rel="icon" type="image/png" href="img/webicon.png"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/style7.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/card.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/sc.css" rel="stylesheet" type="text/css" />
<link href="css/varun_sc.css" rel="stylesheet" type="text/css" />
  
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
          <li><a href="welcome.php">Home</a></li>
          <li><a href="addpost.php">Add Post</a></li>
          <li><a href="edit.php">Edit Profile</a></li>
          <li><a href="u.php">My Profile</a></li>
          <li  class="active1"><a href="setting.php">Settings</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
        <div class="clr"></div>
      </div>     
    </div>

<div class="main">
  <div class="wrap">
      <div class="card2">
      <form name="reg" method="post" action="checkpass.php">
        <div class="caption">
        <h2>Change Password</h2><br>
          <input placeholder="Current Password" type="password" name="password1" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;" tabindex="1" required autofocus>
          <br><br>
          <input placeholder="New Password" type="password" name="password2" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;" tabindex="1" required autofocus>
          <br><br>
          <input placeholder="Confirm Password" type="password" name="password3" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;" tabindex="1" required autofocus>
          <br><br>
        <input type="submit" value="Change Password" name="B4" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br>
        </div>     
    </form>
    </div>

<?php
include("dbconfig.php");
$sql = "select * from user where username='$user' and password='$pass';";
$result =$conn->query($sql);
if ($result->num_rows > 0) {
  $row =$result->fetch_assoc();
  echo '
 <div class="card2">
      <form name="reg2" method="post" action="logout.php">
        <div class="caption">
        
        <img src="data:image/jpeg;base64,'.base64_encode($row['profile']).'" width="200" height="200" style="border-radius: 50%;" /><br><br>
        <input type="submit" value="Log Out" name="logout" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br>
        <input type="submit" value="Delete Account" name="delete" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br>
        </div>     
    </form>
    </div>

  </div>
</div>';
  }

else {
   echo "<tr><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td></tr>";
   echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

$conn->close();
?>
           
</body> 
</html>