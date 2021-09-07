<?php
  include ("include connect.php")
?>
<!DOCTYPE html>
<html>
<title>Library-login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/stylesheet.css">

<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('images/libraryImage.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>

<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<div class="w3-display-middle" name="hidden">
  <h2><b>Login Form:</b></h2>
  
<form action="signIn.php" method="POST">
<div class="imgcontainer">
  <img src="images/avatar.jpg" alt="Avatar" class="avatar">
</div>

  <div class="container">
  <div class="userName">
    <label for="userName"><h4><b>Username:</b></h4></label>
    <input type="text" placeholder="Enter Username" name="userName">
  </div>
  <div class="passWord">
    <label for="passWord"><h4><b>Password:</b></h4></label>
    <input type="password" placeholder="Enter Password" name="psw">
  </div>
  <div>   
    <button type="submit" name="login">Login</button>
  </div>
  </form>
  <form action="forgot.php" method="POST">
    <button type="submit">Forgot Password</button>
  </form>
  <form action="update.php" method="POST">
    <button type="submit">Sign Up</button>
  </form>
  
</div>
</div>
</body>
</html>
<?php
if ( isset( $_POST['signUpbtn'] ) ) {
 $_SESSION['signUpbtn'] = $_POST['signUpbtn'];
}
?>
<?php
  if ( isset( $_POST['login'] ) ) {
   $userName = $_POST["userName"];
   $password = $_POST["psw"];


    $mySql = "SELECT Email FROM users WHERE Email = '$userName' and Password = '$password'";
    
    if ($userName == "cornellmyburgh@outlook.com"){

      echo "invalid user";

    }else {
      echo "Welcome $userName";
    }
  
  }

?>
