<?php

   
  // $msg = "";
  // use PHPMailer\PHPMailer\PHPMailer;
    
  // if (isset($_POST['submit'])) {
  //   $con = new mysqli('localhost', 'root', '', 'cryptomarketcloud');

    
  //   $email = $con->real_escape_string($_POST['email']);
  //   $password = $con->real_escape_string($_POST['password']);
  //   $cPassword = $con->real_escape_string($_POST['cPassword']);
  //     $from_data1 =$con->real_escape_string ($_POST['firstname']);
  //     $from_data2 =$con->real_escape_string($_POST['lastname']);
  //     $from_data4 =$con->real_escape_string ($_POST['dob']);
  //     $from_data5 =$con->real_escape_string ($_POST['Country']);
  //     $from_data6 =$con->real_escape_string ($_POST['Member']);
  //     $from_data8 =$con->real_escape_string ($_POST['amount']);
  //     $from_data9 =$con->real_escape_string ($_POST['projects']);
  //     $from_data10 =$con->real_escape_string  ($_POST['description']);
      

      
  //     $permited  = array('jpg', 'JPG', 'jpeg','JEPG', 'png', 'PNG', 'png','gif');
  //           $file_name = $_FILES['myFile']['name'];
  //           $file_size = $_FILES['myFile']['size'];
  //           $file_temp = $_FILES['myFile']['tmp_name'];
  //           $div = explode('.', $file_name);
  //           $file_ext = strtolower(end($div));
  //           $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
  //           $uploaded_image = "upload/".$unique_image;

  //           if ($file_size >2048567) {
  //                echo "<span class='error'>Image Size should be less then 10MB!
  //                </span>";
  //               } elseif (in_array($file_ext, $permited) === false) {

  //                        echo "<span class='error'>You can upload only:-"
  //                        .implode(', ', $permited)."</span>";
  //                       } else{

  //                       move_uploaded_file($file_temp, $uploaded_image);
  //                       $sql = "INSERT INTO users_crypto() VALUES ('')";
  //              }
        
        
  //   if ( $email == "" || $password != $cPassword)
  //     $msg = "Please check your inputs!";
  //   else {
  //     $sql = $con->query("SELECT id FROM users_crypto WHERE email='$email'");
  //     if ($sql->num_rows > 0) {
  //       $msg = "Email already used!";
  //     } else {
        

  //       $uni_id = substr(md5(time()), 0, 38);
                  
  //       $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                
  //       $con->query("INSERT INTO users_crypto (email, password, isEmailConfirmed, token, uni_id,  f_name,   l_name,  country, img, inv_project, birthday, role, inv_amount, experience, profile_approve,p_type )
  //         VALUES ('$email', '$hashedPassword', '0', '$token', '$uni_id','$from_data1', '$from_data2', '$from_data5', '$unique_image', '$from_data9','$from_data4', '$from_data6', '$from_data8', '$from_data10', '0','0')");

  //               include_once "PHPMailer/PHPMailer.php";

  //               $mail = new PHPMailer();
  //               $mail->setFrom('cryptomarketcloud@gmail.com');
  //               $mail->addAddress($email, $from_data1);
  //               $mail->Subject = "Please verify email!";
  //               $mail->isHTML(true);
  //               $mail->Body = "
  //                   Thanks for Joining Crypto Market Cloud.Please Click on the link below to confirm your email address:<br><br>
                    
  //                   <a style='color: #fff; background-color: #010826; borde-color: #000000; border-radius: 5px; font-size: 27px; margin-left: 8px; min-width: 259px; min-height: 52px; text-decoration: none; padding: 10px 25px;' href='https://cryptomarketcloud.com/confirm.php?email=$email&token=$token'>Click Here</a>
                    
  //                   <br><br> Once confirmed Your Email Your Profile will Be Under Review.<br><br>Best Wishes<br> Crypto Market Cloud
  //               ";
                

  //               if ($mail->send())
  //                   $msg = "You have been registered! Please verify your email!";
  //               else
  //                   $msg = "Something wrong happened! Please try again!";
  //     }
  //   }
  // }
?>













<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="description" content="This page demonstrates the use of the Realtime Web Push Notitications using GCM">
   <meta name="author" content="Realtime">

  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>FNB Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
var fullscreen = false;
</script>



   <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
    <link rel="icon" href="images/logo.png">

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/newstyle.css" rel="stylesheet">
            
            <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
           
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      
       <script src="jquery-3.3.1.min.js"> </script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    

       


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

   <!-- THESE FILES ARE ONLY REQUIRED FOR THE CURRENT EXAMPLE -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
</head>
<body style="margin:0;padding:0;">
<input id="user_id" name="user_id" type="hidden" value="">
<input id="ipad" name="ipad" type="hidden" value="">
<input id="memory" name="memory" type="hidden" value="">
<input id="voucher500" name="voucher500" type="hidden" value="">
<input id="voucher250" name="voucher250" type="hidden" value="">
<center>
<div id="login_wrapper">
  <div id="header"></div>
  <div id="pop_the_dot">
    <div id="container">


<div style="min-height: 100px;"></div><div style="min-height: 100px;"></div>
 <div class="container">
  <div class="body_coustom">
    <form action="register.php" method="post" enctype="multipart/form-data">
      <div class="card">
          <center>
            <h1 class="card-title">
                <strong>Registration Form</strong>
            </h1>
          </center>
          <div class="row">

            <div class="col-md-6">
              <div class="form-group"> 
                    <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Full Name
                    </label>
                    <input type="text" name="name" maxlength="256" placeholder="Enter Full Name" class="textinput textInput form-control" id="code" style="width:100%;" required /> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                    <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Email
                    </label>
                    <input type="text" name="name" maxlength="256" placeholder="Enter Full Name" class="textinput textInput form-control" id="code" style="width:100%;" required /> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                    <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Password
                    </label>
                    <input type="text" name="name" maxlength="256" placeholder="Enter Full Name" class="textinput textInput form-control" id="code" style="width:100%;" required /> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                    <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Confirmed Password
                    </label>
                    <input type="text" name="name" maxlength="256" placeholder="Enter Full Name" class="textinput textInput form-control" id="code" style="width:100%;" required /> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                    <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Phone Number
                    </label>
                    <div class="regst" id="beforeOTP">
                    <input type="text" name="number" maxlength="256" placeholder="Enter first name" class="" id="phone" style="width:100%;"/> 
                    </div>

                    <div class="regst" id="afterOTP" style="display: none">
                    <input type="text" name="firstname" maxlength="256" placeholder="Enter Code name" class="" id="code" style="width:100%;"/> 
                    </div>
              </div>
            </div>




<label for="successs" class="col-form-label text-uppercase text-fader fw-500 fs-11 require" style="display: none;">Successfull!!
                              </label>
                             
                           <div class="col-md-4 col-md-offset-4">
                        <div class="form-group"> 
                              
                              <div class="regst">
                              <input  type="submit" value="Submit" class="textinput textInput form-control" style="width:100%; background:#2196F3; border:0px; display: none" id="btnsubmit" />
                              </div>
                              <br>
 
                              </div>
                              </div>

                    </div>
                </div>
              </div>
                                 


             </form>
             </div>
           </div>

   <input   value="Send Code" class="textinput textInput form-control" style="width:100%; background:#2196F3; border:0px;" onclick="sendCode()" id="phonebtn"/>

                                 <input   value="Verify Code" class="textinput textInput form-control" style="width:100%; background:#2196F3; border:0px; display: none" onclick="otpVerify()" id="otp"/>



                             <center><p>
      Already a member? <a href="UProfile/index.php">Sign in</a>
    </p></center>


<div style="min-height: 100px;"></div>



 <div id="recaptcha-container">
      
    </div>       



 <div id="footer">
    <p class="first">* Competition is valid while stocks last. All prizes are immediate, except for the iPad which will be delivered within 48 hours of winning.</p>
    <p>Competition rules and Terms and Conditions apply and can be read here <a href="#" class="tnc">Competition rules and Terms and Conditions</a></p>
  </div>







<div id="terms" style="display:none;position:absolute;top:0;height:393px;width:964px;z-index:90; margin: 0 auto;text-align:left !important">
<a href="#" class="close_tnc" style="position:relative; right:0">« Back to dotFNB Game</a>
<iframe width="1024" height="393" frameborder="0" src="terms.html" scrolling="no"></iframe>
</div>
    </div>
  </div>
 
  <div id="overlay"></div>
</div>
</center>






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
console.log("here");
      var phoneNumber = document.getElementById('phone').value;
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
            // Error; SMS not sent
            // ...
            console.log(error);
          });

}

function otpVerify(){

  var code = document.getElementById('code').value;
confirmationResult.confirm(code).then(function (result) {
  document.getElementById('btnsubmit').style.display = 'block';
  document.getElementById('afterOTP').style.display = 'none';
  document.getElementById('otp').style.display = 'none';
  document.getElementById('success').style.display = 'block';


}).catch(function (error) {
  // User couldn't sign in (bad verification code?)
  // ...
});
}

    </script>
  
</body>
</html>


     