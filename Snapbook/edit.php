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

	<!-- CSS Files -->
    <link rel="stylesheet" href="css/st.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="img/webicon.png"/>
 <script type="text/javascript">
        
       window.addEventListener('load', function() {
        document.querySelector('input[type="file"]').addEventListener('change', function() {
        if (this.files && this.files[0]) {
          var img = document.querySelector('img');  
          img.src = URL.createObjectURL(this.files[0]); 
          img.onload = imageIsLoaded; 
      }
  });
});

        function validate_form() 
        {
                function getFilePath()
                {
            $('input[type=file]').change(function () 
            {
                filePath=$('#fileUpload').val(); 
                
            });
              }
        }
 
    </script>

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
          <li class="active1"><a href="edit.php">Edit Profile</a></li>
          <li><a href="u.php">My Profile</a></li>
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

			<div class="info">
					<b><h1>'.$row["username"].'</b></h1>
					<hr size="5" class="hrcricket">
				<form name="reg" onsubmit="return validate_form();" method="post" action="update.php" enctype="multipart/form-data">
					<table>
				<tr><td><b>Name:</b></td></tr>
					<tr><td><input type="text" name="name" value="'.$row["name"].'" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;"></td></tr>
					<tr><td></td></tr>

				<tr><td><b>Bio:</b></td></tr>
					<tr><td><textarea name="bio" rows="7" col="20">'.$row["bio"].'</textarea></td></tr>
					<tr><td></td></tr>

				<tr><td><b>Address:</b></td></tr>
					<tr><td><textarea  name="address" rows="7" col="20">'.$row["address"].'</textarea></td></tr>
					<tr><td></td></tr>
				
				<tr><td><b>Mob.no:</b></td></tr>
					<tr><td><input type="number" name="mob" value="'.$row["mob"].'" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;"></td><br>
				</tr>
				<tr><td></td></tr>

				<tr><td><b>Email:</b></td></tr>
					<tr><td><input type="text" name="email" value="'.$row["email"].'" style="font:normal 18px Arial,Helvetica, sans-serif;margin:0;color:#595959;"></td></tr>
					<tr><td></td></tr>

          <tr><td><input type="submit" value="  Submit" name="B4" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br><br></td></tr>
			</table>
      
			</div> 

      <img id="profilepic" src="data:image/jpeg;base64,'.base64_encode($row['profile']).'"/>
      <input align="center" type="file" id="image" name="image" accept="image/*" onclick="getFilePath()"> 
      </form>
		</div>	
</div>
</div>
        ';
} else {
   echo "<tr><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td><td>"."None"."</td></tr>";
   echo "<br>"."try again later"."<br>".$sql."<br>". $conn->error;
}

?>
</body>
</html>