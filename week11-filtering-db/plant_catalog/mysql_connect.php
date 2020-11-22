<?php

  // Connect to DB: Since all files depend on this, this will be included in our header, which is then included in all files.
  $con = mysqli_connect("localhost", "adomingo4","PDsbNesMr3sSS79","adomingo4_dmit2025");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //This stops SQL Injection in POST vars 
    foreach ($_POST as $key => $value) { 
      $_POST[$key] = trim(mysqli_real_escape_string($con, $value)); 
    } 

    //This stops SQL Injection in GET vars 
    foreach ($_GET as $key => $value) { 
      $_GET[$key] = trim(mysqli_real_escape_string($con, $value)); 
    }

?>
