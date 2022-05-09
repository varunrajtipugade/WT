<?php
session_start();
?>
<html>
<head>
    <title>Registration Form</title>

    <!-- icon-->
   <link rel="icon" type="image/png" href="img/webicon.ico"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/style7.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/liststyle.css">
    <link rel="stylesheet" type="text/css" href="css/varun1.css">

    <link rel="stylesheet" type="text/css" href="css/login3.css">
 
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
	<div class="limiter">
	<div class="container-login101">
    <div class="profile">
    <form name="reg" onsubmit="return validate_form();" method="post" action="userinfo.php" enctype="multipart/form-data">
        
        <center>
        <table>

            <img src="img/avatar.jpg" name="Image" id="profilepic" >
            <tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input align="center" type="file" id="image" name="image" accept="image/*" onclick="getFilePath()"></td></tr>
            <!-- td><button value="Upload image" onclick="Upload()">upload</button></td></tr> -->
        
        </table>

        <table class="info">
            <tr>
                <td colspan="2" align="center"></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Name<span style="color:red"></span></td>
 
                <td width="57%"><input type="text" value="" name="name" size="24"></td>
            </tr>         
           <tr>
                <td align="left" valign="top" width="41%">Bio</td>
                <td width="57%"><textarea rows="4" maxlen="200" name="bio" cols="24"></textarea></td>
            </tr>
             
            <tr>
                <td align="left" valign="top" width="41%">Address</td>
                <td width="57%"><textarea rows="4" maxlen="200" name="address" cols="24"></textarea></td>
            </tr>
             <tr>
             <td align="left" valign="top" width="41%">Contact Number:<span style="color:red"></span></td>
            <td width="57%">
                <input type="number"  value="" style="width: 210px;" onkeypress="return isNumberKey(event)" name="MobileNumber"size="24"></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Email:<span style="color:red"></span></td>
                <td width="57%">
                    <input type="text" style="width: 210px;"  value="" name="email" size="24"></td>
            </tr>
       
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="Submit" name="B4" style="width: 50%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;"><br>
                        <input type="reset" value="Reset All" name="B5" style="width: 50%;background-color: #3b5998;color: white;padding: 14px 20px;margin: 8px 0;border: none;">
                    </td>
            </tr>
 
        </table>
        </center>
    </form>
</div>
</div>
</div>
<script type="text/javascript">
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) 
    {
      dropdown[i].addEventListener("click", function() 
        {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") 
          {
            dropdownContent.style.display = "none";
          } else 
          {
           dropdownContent.style.display = "block";
          }
        });
    }
</script>

</body>
 
</html>