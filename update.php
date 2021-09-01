<?php
  include ("connect.php");
?>
  <form action="connect.php" method="POST">
      <input type="text" name="email">
      <input type="password" name="password">
      <input type="submit" value="test" name="test">
    </form>

  <?php
   
  if (isset($_POST["test"])){
    $email = $_POST["email"];
    $passWord = $_POST["password"];
    ///echo $email;
    echo "<br>";
    echo gettype(implode(" ",$email));
    echo "<br>";
    echo "Connected successfully";
    die();

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
  

    $sql = "INSERT INTO users (Email, Password) VALUES ('cornell@gmail.com', 'die123')";
     $conn->query($sql); 
    
   }
?>