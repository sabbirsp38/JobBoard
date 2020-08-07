<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "jobboard";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection    
  if ($conn->connect_error) 
  {
      die("Connection went wrong: " . $conn->connect_error); 
  } 
     
    $from_data1 = addslashes ($_POST['username']);
    $from_data2 = addslashes ($_POST['password']);





  $sql = "INSERT INTO admin_user (username, password) VALUES ('$from_data1', '$from_data2')";
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

