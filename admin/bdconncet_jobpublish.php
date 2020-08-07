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
    
       

if (!isset($_GET['$id']) || $_GET['$id']==NULL  ) {
  header("Location: 404.php") ;
   $id= $_GET['$id'];
}else{
   $id= $_GET['$id'];
}



 
  $sql = "INSERT INTO job (profile_uid, title, category, location, type, experience, sel_range_s,sel_range_e,  qualification, gender, description, responsibilities, education, other_benefits, c_location, c_name, c_web, c_profile,  dead_line, vacancy, img,  job_uid,q_1,q_2,q_3,q_4,q_5) SELECT profile_uid, title, category, location, type, experience, sel_range_s,sel_range_e,  qualification, gender, description, responsibilities, education, other_benefits, c_location, c_name, c_web, c_profile,  dead_line, vacancy, img,  job_uid,q_1,q_2,q_3,q_4,q_5 FROM  job_initial where id=$id" ;

    $sql2= "DELETE FROM job_initial where id=$id" ;

  if ($conn->query($sql) === TRUE) 
  {    
      
     // header("location: icolistmp.php");
  }
  if ($conn->query($sql2) === TRUE) 
  {    
      
      header("location: pandingjoblist.php");
  }

  
  else 
  {   
      echo "Error: " . $sql . "<br>" . $conn->error;
      
  }
  $conn->close();  
?>

