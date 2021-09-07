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

<form action="connect.php" method="POST">
  <div class="container">
      <h1><b>Forgot Password?</b></h1>
      <h2><b>Please fill in this form to reset your password.</b></h2>
    <br>
    <div>
      <label for="email"><h4><b>Email:</b></label>
      <input type="text" placeholder="Enter Email" name="password" required><h4>
    </div>
    <div class="passwordFld">
    <label for="psw"><h4><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required></h4>
    </div>
    <div class="rptPsw">
      <label for="psw-repeat"><h4><b>Confirm Password:</b></label>
      <input type="password" placeholder="Confirm Password" name="password" required></h4>
  </div>
  </div>
<div class="forgotBtns">
  <div>
      <button type="submit" class="cancelbtn">Cancel</button>
  </div>
  <div>
      <button type="submit" class="signupbtn">Confirm</button>
  </div>
    </div>
</form>
<?php
session_start();
$id = $_SESSION["id"];/* userid of the user */
$con = mysqli_connect('localhost','root','','root') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT Emails FROM users WHERE name='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["password"] ) {
mysqli_query($con,"UPDATE users set password='" . $_POST["password"] . "' WHERE name='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
?>
