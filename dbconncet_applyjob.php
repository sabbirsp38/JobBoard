  <?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Formet.php'; ?>

<?php 
 $db = new Database();
 $fm = new Formet();
 ?>

  <?php

          if (!isset($_GET['$job_uid']) || $_GET['$job_uid']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $job_uid= $_GET['$job_uid'];
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

 /*Logo Image start here*/
            $permited  = array('.pdf', '.docx','.PDF',);
            $file_name = $_FILES['cv']['name'];
            $file_size = $_FILES['cv']['size'];
            $file_temp = $_FILES['cv']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;

            $uploaded_image = "upload/".$unique_file;

            if ($file_size >2048567) {
                 echo "<span class='error'>Image Size should be less then 2MB!
                 </span>";
                }
             // else if (in_array($file_ext, $permited) === false) {

             //             echo "<span class='error'>You can upload only:-"
             //             .implode(', ', $permited)."</span>";
             //            } 
                else{

                        move_uploaded_file($file_temp, $uploaded_image);
                        $sql = "INSERT INTO job_applied() VALUES ('')";
               } 

               
/*Logo Image End here*/
    
    $from_data1 = addslashes ($_POST['name']);
    $from_data2 = $unique_file;
    
    $from_data26 = addslashes ($_POST['qus1']);
    $from_data27 = addslashes ($_POST['qus2']);
    $from_data28 = addslashes ($_POST['qus3']);
    $from_data29 = addslashes ($_POST['qus4']);
    $from_data30 = addslashes ($_POST['qus5']);




  $sql = "INSERT INTO  job_applied (name, cv, uni_id,q_1,q_2,q_3,q_4,q_5) VALUES ('$from_data1','$from_data2','$job_uid','$from_data26','$from_data27','$from_data28','$from_data29','$from_data30')";
  if ($conn->query($sql) === TRUE) 
  {    
      
      header("location: index.php");
    
  } 
  else 
  {   
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();  
?>

