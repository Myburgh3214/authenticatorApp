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
  <?php if (!$_POST) { ?>
<form action="index.php" method="post">
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
    <input type="password" placeholder="Enter Password" name="passWord">
  </div>
  <div>   
    <button type="submit" name="login">Login</button>
  </div>
  </form>
  </div class="signUp">
  <form action="update.php" method="post">
  <button type="submit" name="signUpbtn">Sign Up</button>
  </div>
  </div>
</form>
</div>
</div>
</body>
</html>
<?php } else {
  $userName = $_POST["userName"];
  $passWord = $_POST["passWord"];
}
?>
<?php
if ( isset( $_POST['signUpbtn'] ) ) {
 echo "hello";
 $_SESSION['signUpbtn'] = $_POST['signUpbtn'];
}
?>
<?php
if ($userName == "dave@123.com" && $passWord == "1234"){

  echo "<h3>Hello $userName</h3><div>";

}else{
  echo "invalid user or password.";
}
?>
