<?php
  include ("connect.php")
?>
<!DOCTYPE html>
  <html>
  <title>Library-login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!-- Navbar -->
    <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
      <a href="signUplog.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Librarian Menu</a>
      <a href="forgot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Forgot Password</a>
  </div>
  </div>

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-middle" name="hidden">

      <h2 class="loginForm"><b>Login Form:</b></h2>
  
    <form action="index.php" method="POST">
      <div class="imgcontainer">
        <img src="images/avatar.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <div class="userName">
      <label for="userName"><h4><b>Username:</b></h4></label>
      <input type="text" placeholder="Enter Email" name="email">
  </div>

    <div class="passWord">
      <label for="passWord"><h4><b>Password:</b></h4></label>
      <input type="text" placeholder="Enter Password" name="psw">
    </div>

      <button type="submit" name="login">Login</button>
    </div>
  </form>

  <form action="forgotLog.php" method="POST">
    <button type="submit">Forgot Password</button>
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
    $email = $_POST["email"];
    $loginPassword = $_POST["psw"];
    $sqlTargets = "SELECT Email FROM users WHERE Email = '$email' AND Password = '$loginPassword' ";
    $result = $conn->query($sqlTargets);

    if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
           header("Location: signin.php");
        }

    } else {
        echo "Invalid user or password";
    }
    $conn->close();
    }
  
    session_start(); 
     $_SESSION['email'] = "$email";

?>
