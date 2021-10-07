<?php
 
 session_start(); 
  
 $ses = $_SESSION['email'];

include ("connect.php");
?>
<?php

 $usr = "SELECT * FROM  users WHERE email = '$ses'";

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

<body>
 <!-- Navbar -->
<div class="w3-top">

 <div class="w3-bar w3-theme-d2 w3-left-align">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
    <a href="signUplog.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sign Up</a>
    <a href="forgot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Forgot Password</a>
 </div>
</div>

<div class="container">
      <h1><b>Looking For a Book?</b></h1>
      <h2><b>Search what you are looking for using the field below.</b></h2>
    <br>

    <div>
        <form action="signIn.php" method="POST">
          <label for="email"><h4><b>Search Here:</b></label>
          <input type="text" placeholder="Search..." name="searchDb"><h4>
    </div>
  </div>
  </div>

<div class="forgotBtns">
    <form action="signIn.php" method="POST">
  <div>
  
      <button type="submit" name="submitSearch">Confirm Search</button>
      <button type="submit" name="srtName">Sort By Name</button>
      <button type="submit" name="srtAuth">Sort By Author</button>
      <button type="submit" name="srtGenre">Sort By Genre</button>
</div>
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
    $sortBtn = $_POST["submitSearch"];

    $searchDb = $_POST["searchDb"];

   $authJoin = "SELECT books.book_id, books.book_name, books.year, books.genre, books.age_group, authors.author_id, authors.author_name, authors.age, authors.genre, authors.book_id
  FROM books 

  LEFT JOIN authors ON books.book_id = authors.book_id

  WHERE  book_name = '$searchDb' OR book_name LIKE '$searchDb%' OR year = '$searchDb' OR year LIKE '$searchDb%' OR  books.genre = '$searchDb' OR books.genre LIKE '$searchDb%' ";

  $authConn = $conn->query($authJoin);

  $usr = "SELECT * FROM  users WHERE email = '$ses'";

  $result = $conn->query($usr);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if($row['role'] == "customer"){

        $exClude = "SELECT books.book_id, books.book_name, books.year, books.genre, books.age_group FROM books LEFT JOIN authors ON books.book_id = authors.book_id

        WHERE  book_name = '$searchDb' OR book_name LIKE '$searchDb%' OR year = '$searchDb' OR year LIKE '$searchDb%' OR  books.genre = '$searchDb' OR books.genre LIKE '$searchDb%' ";
          $excludeConn = $conn->query($exClude);
        
       

      }else {
        $authJoin = "SELECT books.book_id, books.book_name, books.year, books.genre, books.age_group, authors.author_id, authors.author_name, authors.age, authors.genre, authors.book_id FROM books
        
        LEFT JOIN authors ON books.book_id = authors.book_id

        WHERE  book_name = '$searchDb' OR book_name LIKE '$searchDb%' OR year = '$searchDb' OR year LIKE '$searchDb%' OR  books.genre = '$searchDb' OR books.genre LIKE '$searchDb%' OR author_name OR author_name LIKE '$searchDb%' ";
        $authConn = $conn->query($authJoin);"
        $excludeConn = $conn->query($exClude)";

}
}
}

   if ($authConn->num_rows > 0) {
    // output data of each row

      while($row = $authConn->fetch_assoc()) {

        echo "<h2> " . $row["book_id"]. " " . $row["book_name"]. " " . $row["year"]. " " . $row["genre"]. " ".$row["age_group"]." ".$row["author_name"]. "<br></h2>";
    }
} else {

    echo "<h3>0 results</h3>";

}

$conn->close();

}


if ( isset( $_POST['srtName'] ) ) {

  $sortBtn = $_POST["srtName"];

  $searchDb = $_POST["searchDb"];

  $sqlName = "SELECT * FROM books WHERE book_id = '$searchDb' OR book_name = '$searchDb' OR year = '$searchDb' OR genre = '$searchDb' OR age_group = '$searchDb' OR book_id LIKE '$searchDb%' OR book_name LIKE '$searchDb%' OR year LIKE '$searchDb%' OR genre LIKE '$searchDb%' OR age_group LIKE '$searchDb%' ORDER BY book_name";
  
  $nameSort = $conn->query($sqlName);

  if ($nameSort->num_rows > 0) {
      // output data of each row

      while($row = $nameSort->fetch_assoc()) {

        echo "<h2> " . $row["book_id"]. " " . $row["book_name"]. " " . $row["year"]. " " . $row["genre"]. " ".$row["age_group"]. "<br></h2>";
      }
  } else {
     echo "<h3>0 results</h3>";
  }
  $conn->close();

}

if ( isset( $_POST['srtGenre'] ) ) {

  $sortGen = $_POST["srtGenre"];

  $searchDb = $_POST["searchDb"];

  $sqlName = "SELECT * FROM books WHERE book_id = '$searchDb' OR book_name = '$searchDb' OR year = '$searchDb' OR genre = '$searchDb' OR age_group = '$searchDb' OR book_id LIKE '$searchDb%' OR book_name LIKE '$searchDb%' OR year LIKE '$searchDb%' OR genre LIKE '$searchDb%' OR age_group LIKE '$searchDb%' ORDER BY age_group";
 
  $nameSort = $conn->query($sqlName);
  
  if ($nameSort->num_rows > 0) {
      // output data of each row
      
      while($row = $nameSort->fetch_assoc()) {
        
        echo "<h2> " . $row["book_id"]. " " . $row["book_name"]. " " . $row["year"]. " " . $row["genre"]. " ".$row["age_group"]. "<br></h2>";
      }
  } else {

      echo "<h3>0 results</h3>";

  }

  $conn->close();

}
if ( isset( $_POST['srtAuth'] ) ) {

  $sortGen = $_POST["srtAuth"];

  $searchDb = $_POST["searchDb"];

  $authJoin = "SELECT books.book_id, books.book_name, books.year, books.genre, books.age_group, authors.author_id, authors.author_name, authors.age, authors.genre, authors.book_id
  FROM books 

  LEFT JOIN authors ON books.book_id = authors.book_id

WHERE  book_name = '$searchDb' OR book_name LIKE '$searchDb%' OR year = '$searchDb' OR year LIKE '$searchDb%' OR author_name = '$searchDb' OR author_name LIKE '$searchDb%' OR books.genre = '$searchDb' OR books.genre LIKE '$searchDb%' ";

$authConn = $conn->query($authJoin);

  if ($authConn->num_rows > 0) {
      // output data of each row
      while($row = $authConn->fetch_assoc()) {

        echo "<h2> " . $row["book_id"]. " " . $row["book_name"]. " " . $row["year"]. " " . $row["genre"]. " ".$row["age_group"]." ".$row["author_name"]. "<br></h2>";

      }
  } else {

    echo "<h3>0 results</h3>";

  }

  $conn->close();

}
?>
