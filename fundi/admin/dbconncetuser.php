<?php
include '../lib/Connection.php';
    $from_data1 = addslashes ($_POST['username']);
    $from_data2 = addslashes ($_POST['password']);





  $sql = "INSERT INTO user (username, password) VALUES ('$from_data1', '$from_data2')";
  if ($conn->query($sql) === TRUE) 
  {    
      echo "Message show";
      header("location: userlist.php");
  } 
  else 
  {   
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();  
?>

