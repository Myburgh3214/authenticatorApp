<?php
  include ("connect.php")
  ?>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylesheet.css">
</head>

<style>
  body,h1 {font-family: "Raleway", sans-serif}
  body, html {height: 100%}
  body {
      background-image: url(images/libraryImage.jpg);
  }
</style>
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
    <a href="update.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sign Up</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Forgot Password</a>
 </div>
</div>

<form action="forgot.php" method="POST">
  <div class="container">
      <h1><b>Forgot Password?</b></h1>
      <h2><b>Please fill in this form to reset your password.</b></h2>
    <br>
    <div>
      <label for="email"><h4><b>Email:</b></label>
      <input type="text" placeholder="Enter Email" name="reset" required><h4>
    </div>
    <div class="passwordFld">
    <label for="psw"><h4><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required></h4>
    </div>
    <div class="rptPsw">
      <label for="psw-repeat"><h4><b>Confirm Password:</b></label>
      <input type="password" placeholder="Confirm Password" name="confirm" required></h4>
  </div>
  </div>
<div class="forgotBtns">
  <div>
      <button type="submit" class="cancelbtn">Cancel</button>
  </div>
  <div>
      <button type="submit" name="forgotBtn" class="signupbtn">Confirm</button>
  </div>
    </div>
</form>
<?php
if ( isset( $_POST['forgotBtn'] ) ) {

  $confirm = $_POST["confirm"];
  $emailRst = $_POST["reset"];
  
  $update = "UPDATE users
  SET password = '$confirm'
  WHERE email = '$emailRst'";

  echo $confirm;
  echo $emailRst;


$conn->query($update); 

}
?>
