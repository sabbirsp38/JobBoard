<?php
include_once '../lib/Session.php';
 Session::checkSession();
 
$uni_id = $_SESSION['uni_id'];
$date = time();
$con = new mysqli('localhost', 'gntitcoz_fnbgameadmin', 'mR759f)UIu^v', 'gntitcoz_fnb_game');
  if ($con->connect_error) 
  {
      die("Connection went wrong: " . $con->connect_error); 
  } 
 $query = "update tbl_user set flag = 0, time='$date' where uni_id='$uni_id'";
 if($con->query($query) === TRUE)
  header("Location:index.php");
?>

