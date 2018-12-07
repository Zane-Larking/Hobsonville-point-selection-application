<?php

    require_once "config.php";

    if (isset($_SESSION['access_token'])) {
    	header('Location: StudentsHomepage.php');
    	exit();
    }

    $loginURL = $gClient->createAuthUrl();


 ?>



<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="Styles/Login.css">

  <?php
  include "DataBase/Databaseconnect.php";
  $name = $password = "";
  $sql = "SELECT * FROM 'Users' WHERE name = $name AND password = $password";



  //mysqli_query
  ?>
  <script>
    var checkpassword = function(e){
      document.body.style.backgroundColor = "red";
    }
  </script>

  </head>

  <body>
    <font face = "Verdana">
      <div style="background-color:White;width:60%;height:auto; margin-left:20%; border:1px solid black;padding:15px;">
        <img src="Images/HPSSLogo.png" alt="HPSS Logo" style="height: 100px">
        <center>
          <form>
            <h1><font face ="Verdana">*PlaceHolderName*</h1></font>
            
              Username:<br><br>
              <input class="inputboxes" type="text" name="Username"value="<?php echo $name ?>" disabled><br><br>
              Password:<br><br>
              <input class="inputboxes" type="text" name="Password"value="<?php echo $password ?>" disabled><br><br>

              <button id="SubmitLogin" class="button" onclick="if(event.preventDefault) event.preventDefault(); checkpassword();" disabled>Login</button>

              
              <!--<button type="button"buttononclick="alert('Class Submitted')">Submit</button></p>      *don't need this anymore but pls don't remove* -->

            
          </form>
        <a id="g-login" onclick="window.location = '<?php echo $loginURL ?>';"> <img src = "Images/GoogleButton.png" onmousedown="src='Images/GoogleButtonPresses.png'"> </a>
        </center>
      </div>
    </font>
  </body>
</html>
