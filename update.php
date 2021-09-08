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
      <input type="submit" value="Submit" name="submitBtn">
    </form>

  <?php
   
  if (isset($_POST["submitBtn"])){
    $email = $_POST["email"];
    $passWord = $_POST["password"];
    $userName = $_POST["userName"];

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    
  }
?>
<?php
    if (isset($_POST["submitBtn"])){
      if($passWord == "das123"){
        $sql = "INSERT INTO users (Email, Password, role) VALUES ('$email', '$passWord', 'admin')";
        $conn->query($sql); 
      }
      else{
        $sql = "INSERT INTO users (Email, Password, role) VALUES ('$email', '$passWord', 'member')";
        $conn->query($sql); 
      }
    }





?>