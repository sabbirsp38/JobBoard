
<?php

   
	$msg = "";
	use PHPMailer\PHPMailer\PHPMailer;
    
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'jobboard');

		$name = $con->real_escape_string($_POST['name']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);
		//$uni_id = $con->real_escape_string($_POST['uni_id']);
        
        
		if ($name == "" || $email == "" || $password != $cPassword)
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "Email already exists in the database!";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);
				$uni_id = substr(md5(time()), 0, 38);
                  
				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                
				$con->query("INSERT INTO users (name,email,password,isEmailConfirmed,token,uni_id)
					VALUES ('$name', '$email', '$hashedPassword', '0', '$token', '$uni_id');
				");

                include_once "PHPMailer/PHPMailer.php";

                $mail = new PHPMailer();
                $mail->setFrom('sabbirsp38@gmail.com');
                $mail->addAddress($email, $name);
                $mail->Subject = "Please verify email!";
                $mail->isHTML(true);
                $mail->Body = "
                    Thanks for Joining in our MFrame Family.Please Click on the link below to confirm your email address:<br><br>
                    
                    <a style='color: #fff; background-color: #010826; borde-color: #000000; border-radius: 5px; font-size: 27px; margin-left: 8px; min-width: 259px; min-height: 52px; text-decoration: none; padding: 10px 25px;' href='https://smtecbd.com/sabbir/confirm.php?email=$email&token=$token'>Click Here</a>
                    
                    <br><br> Once confirmed You will able to Login.<br><br>Best Wishes<br> MFrame
                ";
                

                if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<?php include 'inc/hader2.php'; ?>
<body>
	<section id="particles-js" ></section>
    <script type="text/javascript" src="js/particles.js"></script>
       <script type="text/javascript" src="js/app.js"></script>
	<div class="container" style="margin:200px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<center><h3 class="colrtext">Welcome To MFrame Family</h3></center>
                 <center><p class="colrtext">Already Have Account <a href="UProfile/index.php">Log In</a></p></center>

				<br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">

					<input class="form-control" name="name" placeholder="Name..."><br>
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="form-control" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm Password..."><br>
					<smail style="color: white; ">I agree with all <a href="">terms and condition</a></smail><br>
					<input class="loginbut" type="submit" name="submit" value="Register">
				</form>

			</div>
		</div>
	</div>
<?php include 'inc/foter.php'; ?>