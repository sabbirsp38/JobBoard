    <?php

          if (!isset($_GET['$id']) || $_GET['$id']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $id= $_GET['$id'];
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
            $permited  = array('jpg', 'JPG', 'jpeg','JEPG', 'png', 'PNG', 'png','gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;

            $uploaded_image = "../upload/".$unique_image;

            if ($file_size >2048567) {
                 echo "<span class='error'>Image Size should be less then 2MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {

                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                        } else{

                        move_uploaded_file($file_temp, $uploaded_image);
                        $sql = "INSERT INTO job() VALUES ('')";
               } 

               
/*Logo Image End here*/
    
    $from_data1 = addslashes ($_POST['title']);
    $from_data2 = addslashes ($_POST['job_cat']);
    $from_data3 = addslashes ($_POST['location']);
    $from_data4 = addslashes ($_POST['job_type']);
    $from_data5 = addslashes ($_POST['experience']);
    $from_data6 = addslashes ($_POST['salary_range_s']);
    $from_data31 = addslashes ($_POST['salary_range_e']);
    $from_data7 = addslashes ($_POST['edu']);
    $from_data8 = addslashes ($_POST['gender']);
    $from_data9 = addslashes ($_POST['job_description']);
    $from_data10 = addslashes ($_POST['responsibilities']);
    $from_data11 = addslashes ($_POST['education']);
    $from_data12 = addslashes ($_POST['benefits']);
    $from_data16 = addslashes ($_POST['c_location']);
    $from_data17 = addslashes ($_POST['c_name']);
    $from_data18 = addslashes ($_POST['c_web']);
    $from_data19 = addslashes ($_POST['c_about']);
  
    $from_data22 = addslashes ($_POST['dead_line']);
    $from_data23 = addslashes ($_POST['vacancy']);
    $from_data24 = $unique_image;
    $from_data26 = addslashes ($_POST['qus1']);
    $from_data27 = addslashes ($_POST['qus2']);
    $from_data28 = addslashes ($_POST['qus3']);
    $from_data29 = addslashes ($_POST['qus4']);
    $from_data30 = addslashes ($_POST['qus5']);



  $sql = "UPDATE job set title='$from_data1', category='$from_data2', location='$from_data3', type='$from_data4', experience='$from_data5', sel_range_s='$from_data6', sel_range_e='$from_data31', qualification='$from_data7', gender='$from_data8', description='$from_data9', responsibilities='$from_data10', education='$from_data11', other_benefits='$from_data12', c_location='$from_data16', c_name='$from_data17', c_web='$from_data18', c_profile='$from_data19',  dead_line='$from_data22', vacancy='$from_data23', img='$from_data24', q_1='$from_data26',q_2='$from_data27',q_3='$from_data28',q_4='$from_data29',q_5='$from_data30'where id=$id ";
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

