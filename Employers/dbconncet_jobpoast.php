<?php 
 include '../lib/Session.php';
 Session::checkSession();
$uni_id = $_SESSION['uni_id'];
$con = new mysqli('localhost', 'root', '', 'jobboard');
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
    $from_data25 = substr(md5(time()), 0, 20);;

    $from_data26 = addslashes ($_POST['qus1']);
    $from_data27 = addslashes ($_POST['qus2']);
    $from_data28 = addslashes ($_POST['qus3']);
    $from_data29 = addslashes ($_POST['qus4']);
    $from_data30 = addslashes ($_POST['qus5']);



  $sql = "INSERT INTO  job_initial (profile_uid, title, category, location, type, experience, sel_range_s,sel_range_e,  qualification, gender, description, responsibilities, education, other_benefits, c_location, c_name, c_web, c_profile,  dead_line, vacancy, img,  job_uid,q_1,q_2,q_3,q_4,q_5) VALUES ('$uni_id','$from_data1', '$from_data2',  '$from_data3','$from_data4','$from_data5', '$from_data6','$from_data31', '$from_data7', '$from_data8', '$from_data9', '$from_data10', '$from_data11', '$from_data12','$from_data16', '$from_data17', '$from_data18', '$from_data19','$from_data22','$from_data23','$from_data24','$from_data25','$from_data26','$from_data27','$from_data28','$from_data29','$from_data30') 
    ";
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

