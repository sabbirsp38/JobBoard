
<?php

  //$number=""; 
	$msg = "";
	
    
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'gntitcoz_fnbgameadmin', 'mR759f)UIu^v', 'gntitcoz_fnb_game');

		
		$number = $con->real_escape_string($_POST['number']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);
	  $from_data1 =$con->real_escape_string ($_POST['name']);
	    

	    $date =time();

        
		if ( $number == "" || $password != $cPassword)
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM tbl_user WHERE user_number='$number'");
			if ($sql->num_rows > 0) {
				$msg = "Number already used!";
			} else {
				
				$uni_id = substr(md5(time()), 0, 38);
                  
				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
             
             $query = "INSERT INTO tbl_user (user_number, password, uni_id,  name,time,flag)
          VALUES ('$number', '$hashedPassword',  '$uni_id','$from_data1','$date',0)"; 
				
           $sql1 =  $con->query($query);
        

        if ($sql1==true) {
          header("location:index.php");
        }else
        {
         $msg = $query;
        }
   
               
			}
		}
  }
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <link rel="stylesheet" href="css/newstyle.css">

            
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
      

  </head>
  <body>




			<div class="container-fluid DIS" style="margin-top: 30px;">
  <div class="container">
    <div class="haderimg">
      <!-- <img src="img/header.png" class="haderimg img-responsive "> -->
   </div>
   <center>
    <div class="row" >

       <form action="register_new.php" method="post" enctype="multipart/form-data">
       	
                <div class="card">
                    <center><header class="card-header">
                <h1 class="card-title">
                <strong>Registration Form</strong>

                </h1>
                <h1 class="card-title" style="color: red;">
                
                <?php if ($msg != "") echo $msg . "<br><br>" ?>
                <label  id="successs" class="col-form-label text-uppercase text-fader fw-500 fs-11 require" style="display: none;">Successfull!!</label>
                </h1>
                </header></center>
                <div class="card-body">
                      <div class="container_iner">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group"> 
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Full Name
                              </label>
                              <div class="regst">
                              <input type="text" name="name" maxlength="256" placeholder="Enter Full name" class="textinput textInput form-control" required style="width:50%;"/> 
                              </div>
                              </div>
                              </div>
                              
                              
                              
                              <div class="col-md-12">
                              <div class="form-group"> 
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Password
                              </label>
                              <div class="regst">
                              <input type="password" name="password" maxlength="256" placeholder="Enter password" class="textinput textInput form-control" required style="width:50%;"/> 
                              </div>
                              </div>
                              </div>
                              <div class="col-md-12">
                              <div class="form-group"> 
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Confirm password
                              </label>
                              <div class="regst">
                              <input type="password" name="cPassword" maxlength="256" placeholder="Confirm password" class="textinput textInput form-control" required style="width:50%;"/> 
                              </div>
                              </div>
                              </div>
                              <div class="col-md-12">
                               <div class="form-group"> 

                                <p  for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require" id="numberT" style="display: none">Some
                              </p>
                              <input type="hidden" value="something" name="number" id="something" />
                              <div class="regst" id="beforeOTP">
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require" >Phone Number
                              </label>
                              <input type="text" maxlength="256" placeholder="Enter Your Phone Number With Valid Country Code" class="textinput textInput form-control" required style="width:50%;" id="phone"/>
                              </div>
                              <div class="regst" id="afterOTP" style="display: none">
                                <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Verification Code
                              </label>
                              <input type="text"  maxlength="256" placeholder="Please Enter 6 Digit One Time Passcode" class="textinput textInput form-control"  style="width:50%; " id="code"/>

                              </div>
                              </div>
                              </div>


                          
                           <div class="col-md-4 col-md-offset-4">
                        <div class="form-group"> 
                              
                              <div class="regst">
                              <input type="submit" name="submit" value="COMPLETE REGISTRATION" class="textinput textInput form-control"  style="width: 100%;background: #1d0091;border: 0px;color: white;font-size: 18px;text-transform: uppercase;font-weight: bold; display: none;" id="btnsubmit"/>
                              </div>
                              <br>
                             
                              </div>
                              </div>

                    </div>
                </div>
                                    </div>
                              </form>

<div class="col-md-4 col-md-offset-4">
                              <p   class="textinput textInput form-control"  onclick="sendCode()" id="phonebtn" style="background: #1d0091;border: 0px;color: white;font-size: 18px;text-transform: uppercase;font-weight: bold; ">SEND CODE</p>



                               <p  value="Verify Code" class="textinput textInput form-control" onclick="otpVerify()" id="otp" style="background: #1d0091;border: 0px;color: white;font-size: 18px;text-transform: uppercase;font-weight: bold; display: none;">Verify Your Number</p>        
                            </div><br>
                             
                            </div>
                  
<center><p style="color: black;">
      Already a member? <a style="color: blue;" href="index.php">Sign in</a>
    </p></center>
 </center>




 <div id="recaptcha-container">
      
    </div>  

<div id="firebaseui-auth-container"></div>
<center id="specialstuff" style="display:none"></center>
<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-auth.js"></script>


<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAV4RbOCLpj3Po9JV367YbPliHGMo0hEkY",
    authDomain: "fbngame-9cfca.firebaseapp.com",
    databaseURL: "https://fbngame-9cfca.firebaseio.com",
    projectId: "fbngame-9cfca",
    storageBucket: "",
    messagingSenderId: "543063353381",
    appId: "1:543063353381:web:dd94cd122a754640"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

        
  setTimeout(function() {
  
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': function(response) {
            console.log("success", response);
        },
        'expired-callback': function() {
            console.log("expired-callback");
        }
    });

    recaptchaVerifier.render().then(function(widgetId) {
        window.recaptchaWidgetId = widgetId;
    });

  },2000);
function sendCode(){
      var phoneNumber = document.getElementById('phone').value;
      if(phoneNumber=="")
      {
        alert("please Enter Valid Phone Number");

      }else{
      var appVerifier = window.recaptchaVerifier;
      firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function (confirmationResult) {
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
            document.getElementById('beforeOTP').style.display = 'none';
            document.getElementById('afterOTP').style.display = 'block';
             document.getElementById('phonebtn').style.display = 'none';
              document.getElementById('otp').style.display = 'block';

          }).catch(function (error) {
          console.log(error.code);
          document.getElementById('numberT').style.display = 'block';
           document.getElementById('numberT').style.color  = 'red';
          document.getElementById('numberT').innerHTML = error.message;
          });
}
}

function otpVerify(){

  var code = document.getElementById('code').value;
confirmationResult.confirm(code).then(function (result) {
  document.getElementById('btnsubmit').style.display = 'block';
  document.getElementById('afterOTP').style.display = 'none';
  document.getElementById('otp').style.display = 'none';
  document.getElementById('numberT').style.display = 'block';
    
  document.getElementById('numberT').innerHTML = "Verified Number : "+firebase.auth().currentUser.phoneNumber;
  document.getElementById('something').value = firebase.auth().currentUser.phoneNumber;

 
  
}).catch(function (error) {
 
 alert("Invalid Verification Code");
});
}

    </script>

       <?php include 'inc/foter.php'; ?> 