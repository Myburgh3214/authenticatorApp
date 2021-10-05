<?php
 session_start(); 
 $ses = $_SESSION['email'];


include ("connect.php");
?>
<?php
 $usr = "SELECT * FROM  users WHERE email = '$ses'";
echo $usr;
 $result = $conn->query($usr);
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo $row['role'];
     
     }
 }
 
?>

<!DOCTYPE html>
<html>
<title>Signed In</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylesheet.css">
<style>
    body,h1 {font-family: "Raleway", sans-serif}
  body, html {height: 100%}
  body {
      background-image: url(images/libraryImage.jpg);
  }
</style>

<body>
 <!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
    <a href="update.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sign Up</a>
    <a href="forgot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Forgot Password</a>
 </div>
</div>
<div class="container">
      <h1><b>Looking For a Book?</b></h1>
      <h2><b>Search what you are looking for using the field below.</b></h2>
    <br>
    <div>
        <form action="#" method="POST">
      <label for="email"><h4><b>Email:</b></label>
      <input type="text" placeholder="Email" name="searchDb"><h4>
      <label for="email"><h4><b>Password:</b></label>

      <input type="text" placeholder="Password" name="psw"><h4>
    </div>
    
      
  </div>
  </div>
<div class="forgotBtns">
    <form action="#" method="POST">
  <div>
      <button type="submit" class="cancelbtn">Cancel</button>
  </div>
  <div>
      <button type="submit" name="submitSearch">Confirm</button>
  
    </div>
    </form>
</form>
    </div>
    
  </div>
</div>

</body>
</html>
<?php
if ( isset( $_POST['submitSearch'] ) ) {
  $confirm = $_POST["submitSearch"];
  $addEmail = $_POST["searchDb"];
  $loginPassword = $_POST["psw"];
 
  
$usr = "SELECT * FROM  users WHERE email = '$addEmail'";
echo $row['role'];
$result = $conn->query($usr);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['role'] == "librarian"){
        header("Location: forgot.php");
      
       

      }else {
       echo "invalid user";
      }
   
      
       }
    
       $conn->close();

  

}
}




   ?>