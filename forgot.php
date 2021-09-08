<?php
  include ("connect.php")
  ?>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<style>
  body,h1 {font-family: "Raleway", sans-serif}
  body, html {height: 100%}
  body {
      background-image: url(images/libraryImage.jpg);
  }
</style>

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
