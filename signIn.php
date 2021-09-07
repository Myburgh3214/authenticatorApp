<?php
    include ("connect.php");
?>
<!DOCTYPE html>
<html>
<title>Signed In</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/stylesheet.css">

<style>
    body,h1 {font-family: "Raleway", sans-serif}
  body, html {height: 100%}
  body {
      background-image: url(images/libraryImage.jpg);
  }
</style>

<body>
    <form action="signIn.php" method="POST">
        <input type="text" name="searchDb" placeholder="search">
        <input type="submit" name="submitSearch">
    </form>

</body>
</html>
<?php



if ( isset( $_POST['submitSearch'] ) ) {

    $searchDb = $_POST["searchDb"];
    $sqlTarget = "SELECT email FROM users WHERE email = '$searchDb' ";
    $result = $conn->query($sqlTarget);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["email"]."<br>";
        }
    } else {
      echo "0 results";
    }
    $conn->close();
        
    


   
    
}

?>
