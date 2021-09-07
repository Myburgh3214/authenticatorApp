<?php
  include ("connect.php");
?>
<style>
    body,h1 {font-family: "Raleway", sans-serif}
  body, html {height: 100%}
  body {
      background-image: url(images/libraryImage.jpg);
  }
</style>

  <form action="update.php" method="POST">
      <label>Email:</label>
      <input type="text" name="email">
      <label>Password:</label>
      <input type="text" name="password">
      <label>Username/ID:</label>
      <input type="text" name="userName">
      <input type="submit" value="Submit" name="submitBtn">
    </form>

  <?php
   
  if (isset($_POST["submitBtn"])){
    $email = $_POST["email"];
    $passWord = $_POST["password"];
    $userName = $_POST["userName"];
    ///echo $email;
    echo "<br>";
    echo gettype(implode(" ",$email));
    echo "<br>";
    

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (Email, Password, ID) VALUES ('$email', '$passWord', '$userName')";
     $conn->query($sql); 
    
  }
?>