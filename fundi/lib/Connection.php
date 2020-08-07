<?php

   $servername = "localhost";
    $username = "gntitcoz_fnbgameadmin";
    $password = "mR759f)UIu^v";
    $dbname = "gntitcoz_fnb_game";


//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "fnb_game";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection    
  if ($conn->connect_error) 
  {
      die("Connection went wrong: " . $conn->connect_error); 
  } 

  ?>