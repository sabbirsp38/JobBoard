
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Formet.php'; ?>

<?php 
 include '../lib/Session.php';
 Session::init();
 if(isset($_SESSION['uni_id'])){
 $uni_id = $_SESSION['uni_id'];}
 else
$uni_id =null;

include '../lib/Connection.php';


$db = new Database();
$fm = new Formet();
 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="description" content="This page demonstrates the use of the Realtime Web Push Notitications using GCM">
   <meta name="author" content="Realtime">

  

   <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>FNB Game</title>
    <link rel="icon" href="images/logo.png">

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/style.css">
			 <link rel="stylesheet" href="css/rating.css">
            <link rel="stylesheet" href="css/foterpost.css">
            <link rel="stylesheet" href="css/animate.min.css">
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			
			 <script src="jquery-3.3.1.min.js"> </script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
	   <script src="js/rating.js"></script>
     <script src="js/rating2.js"></script>
	 <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

       <link href='style-slider.css' rel='stylesheet'/>
       <link href='css/token.css' rel='stylesheet'/>

<script src="touchslider.js"></script>

<link rel="stylesheet" href="css/social-buttons.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/social-buttons.js"></script>
 
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

 <!-- THESE ARE THE REQUIRED FILES TO USE WEB PUSH NOTIFICATIONS -->
<link rel="manifest" href="manifest.json">  
  <script src="//messaging-public.realtime.co/js/2.1.0/ortc.js"></script>

   <!-- THESE FILES ARE ONLY REQUIRED FOR THE CURRENT EXAMPLE -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  



  <script src="dex.js"></script>

 
 <script src="https://www.gstatic.com/firebasejs/3.5.1/firebase.js"></script>
  <script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBQT4ykCO54Ygslw74AJIAND__ZR0vUxkM",
    authDomain: "web-push-demo-cf974.firebaseapp.com",
    databaseURL: "https://web-push-demo-cf974.firebaseio.com",
    storageBucket: "web-push-demo-cf974.appspot.com",
    messagingSenderId: "915139563807"
  };
  firebase.initializeApp(config);
  </script>

 <script src="WebPushManager.js"></script>

  

  </head>
  <body>
    <!--NAVIGATION-->
   