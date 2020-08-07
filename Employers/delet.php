<?php

          if (!isset($_GET['$delid']) || $_GET['$delid']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $delid= $_GET['$delid'];
          }

        ?>


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

 

  $sql = "DELETE FROM job_applied WHERE id='$did'";
  if ($conn->query($sql) === TRUE) 
  {    
      
      header("location: employer-dashboard.php");
  } 
  else 
  {   
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();  
?>

