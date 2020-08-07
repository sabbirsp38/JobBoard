
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

?>



<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'jobboard');

		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);

		if ($email == "" || $password == "")
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id, password, uni_id, isEmailConfirmed FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
	                    $msg = "Please verify your email!";
                    else {
                        
	                    Session::set("login", true);
				        Session::set("username", $value['username']);
				        Session::set("userId", $value['id']);
			           
				        $_SESSION['uni_id'] = $data['uni_id'];
	                    header("Location:employer-dashboard.php");
                    }
                } else
	                $msg = "Please check your inputs!";
			} else {
				$msg = "Please check your inputs!";
			}
		}
	}
?>

<?php include 'inc/hader2.php' ?>

	
	<div class="container bodydiv" >
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<center><h3 class="colrtext">Welcome To Job Bord</h3></center>
                 <center><p class="colrtext">New on this Platfrom <a href="../register.php">become a contributor</a></p></center>
				

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="index.php">
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="form-control" name="password" type="password" placeholder="Password..."><br>
					<input class=" loginbut" type="submit" name="submit" value="Log In">
				</form>

			</div>
		</div>
	</div>

<?php include 'inc/foter.php'; ?>