
<?php 
 include '../lib/Session.php';
 Session::init();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Formet.php'; ?>

<?php 


$db = new Database();
$fm = new Formet();
 if (isset($_GET['ref'])) {

	$id= $_GET['ref'];
				  
}else{
$id= null;
}
if(isset($_SESSION['uni_id']))
{
header("Location:profileindex.php");
}



?>



<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		//$con = new mysqli('localhost', 'cryptomarket', '123456', 'cryptomarketcloud');

		$con = new mysqli('localhost', 'root', '', 'cryptomarketcloud');

		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);

		if ($email == "" || $password == "")
			$msg = "Email or Password Should Not Be Empty!";
		else {
			$sql = $con->query("SELECT id, password, isEmailConfirmed,uni_id,profile_approve,p_type FROM users_crypto WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
	                    $msg = "Please verify your email!";
	                if ($data['profile_approve'] == 0)
	                    $msg = "Profile under review!";
                    else {

	                    Session::set("login", true);
				         $_SESSION['uni_id'] = $data['uni_id'];
				         $ref = $_GET['ref'];
				         
				       if($ref==null)
				       {
				       	if ($data['p_type'] == 0)
							header("Location:profileindex.php");
				       	if ($data['p_type'] == 1)
						
							header("Location:pprofileindex.php");  
				       	 
				       }
						else
						{
							$id = $_GET['ref'];
                            header("Location:../memberprofile.php?id=$id");   
							
						}
					
                    }
                } else
	                $msg = "Email and Password Combination Not Matched";
			} else {
				$msg = "Email and Password Combination Not Matched";
			}
		}
	}
?>
<?php include 'inc/hader.php'; ?>

	
	<div class="container bodydiv" >
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<center><h3 class="colrtext">Welcome To Crypto Market Cloud</h3></center>
                 <center><p class="colrtext">New on this Platfrom <a href="../register.php">Register</a></p></center>
				

				<center><h3 style="color: red;"><?php if ($msg != "") echo $msg . "<br><br>" ?></h3></center>

				
					<form method="post" action="index.php?ref=<?php echo $id ?>">
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="form-control" name="password" type="password" placeholder="Password..."><br>
					<input class=" login_but" type="submit" name="submit" value="Log In">
				</form>
				

			</div>
		</div>
	</div>

<?php include 'inc/foter.php'; ?>