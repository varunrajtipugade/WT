<?php
session_start();
?>
<html>
<head>
    <title>Snapbook</title>

    <!-- icon-->
   <link rel="icon" type="image/png" href="img/webicon.ico"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/style7.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/card.css">
<link rel="icon" type="image/png" href="img/webicon.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/sc.css" rel="stylesheet" type="text/css" />
<link href="css/varun_sc.css" rel="stylesheet" type="text/css" />
 
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
          <li class="active1"><a href="addpost.php">Add Post</a></li>
          <li><a href="edit.php">Edit Profile</a></li>
          <li><a href="u.php">My Profile</a></li>
          <li><a href="setting.php">Settings</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
        <div class="clr"></div>
      </div>     
    </div>

<div class="main">
  <div class="wrap">
    <div class="profile">
      <form name="reg" onsubmit="return validate_form();" method="post" action="addp.php" enctype="multipart/form-data">
        <div class="caption">
        <h3>Caption</h3>
        <textarea rows="4" maxlen="200" name="caption" cols="24"></textarea><br><br>
        <input type="submit" value="Submit" name="B4" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br><br>
        <input type="reset" value="  Reset All   " name="B5" style="width: 70%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br>
      </div>
      <div class="card2">
        <img src="img/pic2.png" name="Image" width="380" height="380">
        <div class="container2">
            <input align="center" type="file" id="image" name="image" accept="image/*" onclick="getFilePath()">
        </div>
      </div>
      
    </form>
    </div>
  </div>
</div>    

</body>
 
</html>