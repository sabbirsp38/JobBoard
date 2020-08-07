<?php

class Formet{


public function textlimit($text , $limit= 100 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}
public function textlimitlp($text , $limit= 100 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}
public function textlimitlps($text , $limit= 60 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}

public function textshortentn($text , $limit= 60 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}
public function textlimittitle($text , $limit= 38 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}

public function textlimittiti($text , $limit= 50 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}
public function textlimitb($text , $limit= 100 ){
  $text = $text. " ";
  $text = substr($text, 0, $limit );
  $text = $text. "....";
  return $text; 

}



 public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

 public function title(){
  $path = $_SERVER['SCRIPT_FILENAME'];
  $title = basename($path, '.php');
  //$title = str_replace('_', ' ', $title);
  if ($title == 'index') {
   $title = 'home';
  }elseif ($title == 'contact') {
   $title = 'contact';
  }
  return $title = ucfirst($title);
 }






}?>