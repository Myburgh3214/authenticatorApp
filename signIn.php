<?php
 session_start(); 
 $_SESSION["email"] = "$email";
 $_SESSION["psw"] = "$loginPassword";
    
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
<div class="container">
      <h1><b>Looking For a Book?</b></h1>
      <h2><b>Search what you are looking for using the field below.</b></h2>
    <br>
    <div>
        <form action="signIn.php" method="POST">
      <label for="email"><h4><b>Search Here:</b></label>
      <input type="text" placeholder="Search..." name="searchDb" required><h4>
    </div>
    
      
  </div>
  </div>
<div class="forgotBtns">
    <form action="signIn.php" method="POST">
  <div>
      <button type="submit" class="cancelbtn">Cancel</button>
  </div>
  <div>
      <button type="submit" name="submitSearch">Confirm</button>
  </div>
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

    $searchDb = $_POST["searchDb"];
    $sqlTarget = "SELECT * FROM books WHERE book_id = '$searchDb' OR book_name = '$searchDb' OR year = '$searchDb' OR genre = '$searchDb' OR age_group = '$searchDb' OR book_id LIKE '$searchDb%' OR book_name LIKE '$searchDb%' OR year LIKE '$searchDb%' OR genre LIKE '$searchDb%' OR age_group LIKE '$searchDb%'";
    $result = $conn->query($sqlTarget);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<h2> " . $row["book_id"]. " " . $row["book_name"]. " " . $row["year"]. " " . $row["genre"]. " ". "<br></h2>";
        }
    } else {
      echo "<h3>0 results</h3>";
    }
    $conn->close();
    
}

?>
<?php

  $usr = "SELECT email, role FROM  users WHERE = '$email'";

  if($usr == "member"){
    echo "hello world";
    

  }else{
    echo "hello admin";
  }

?>
