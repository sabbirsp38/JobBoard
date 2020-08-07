<?php

// $con = new mysqli('localhost', 'root', '', 'fnb_game');
$con = new mysqli('localhost', 'gntitcoz_fnbgameadmin', 'mR759f)UIu^v', 'gntitcoz_fnb_game');

$fundi_Provides = $fundi_do = $fundi_from = $fundi_name = $minimum_salary = $fundi_slogan="";




    $fundi_Provides =$con->real_escape_string($_POST['fundi_Provides']);
    $fundi_do = $con->real_escape_string($_POST['fundi_do']);
    $fundi_from = $con->real_escape_string($_POST['fundi_from']);
    $fundi_name = $con->real_escape_string($_POST['fundi_name']);
    $minimum_salary = $con->real_escape_string($_POST['minimum_salary']);
    // $fundi_slogan = $con->real_escape_string($_POST['fundi_slogan']);


    if ($fundi_Provides=="Educational loans") {
       if ($fundi_do=="One place for funding all things in Education") {
       if ($fundi_from=="Yes") {
       if ($fundi_name=="EduCate") {
       if ($minimum_salary=="R2500") {
       header("Location:dbconnect_flag2.php");
                             }else{
       header("Location:index.php");
    }
                          }else{
       header("Location:index.php");
    }
                      }else{
       header("Location:index.php");
    }
                  }else{
       header("Location:index.php");
    }
              }else{
       header("Location:index.php");
    }
     
  $con->close();  
?>