<?php
class tfs_secure {

	var $conn;				// Connection variable
	var $login_page;				// login page
	var $table_name;        // table name
	var $userid;
	var $username;        // table name
	var $password;        // table name
	


	function __construct() {
		
		session_start();
		
		
		
		$this->conn = tfs_dbconn();
		$this->login_page = "login.php";
		$this->table_name = "dotfnb_user";
		$this->userid = "dotfnb_user_id";
		$this->username = "dotfnb_user_username";
		$this->password = "dotfnb_user_password";
		
		if(isset($_GET['logout']) && $_GET['logout'] == 'true') {
			session_destroy();
			header("Location: $this->login_page");
		}
	}
	
	public function __destruct() {
		mysql_close($this->conn);
	}
	
	public function tfs_secure($success, $fail){
		
		if(isset($_GET['logout'])) {
			$this->tfs_logout('login');
		} else if (! isset($_SESSION['tfs_username'])) {
			// If no previous session, has the user submitted the form? 
			if (isset($_POST['username'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				// Look for the user in the users table.
				$query = "SELECT " . $this->userid . ", " . $this->username . ", " . $this->password . " FROM " . $this->table_name . " WHERE " . $this->username . " = '". $username . "' AND " . $this->password . " = '" . $password . "'";
				
				$result = mysql_query($query) or die(mysql_error());
				// Has the user been located?
				if (mysql_numrows($result) == 1){
					$_SESSION['tfs_username'] = mysql_result($result,0,$this->username);
					//echo "You've successfully logged in. ";
					$_SESSION['tfs_userid'] = mysql_result($result,0,$this->userid);
					$success('Welcome');
				}else{
					// Wrong credentials
					$fail('Incorrect');
				}
				
				// If the user has not previously logged in, show the login form
			} else {
				$fail('login');
			}
			
		// The user has returned. Offer a welcoming note.
		} else {
			$success('Welcome');
		}
	}
	
	public function tfs_logout($login){
	
		if(isset($_SESSION['tfs_userid']) && isset($_SESSION['tfs_username'])){
			
			
			foreach($_SESSION as $key=>$value){
				unset($_SESSION[$key]);
			}
			
			$login('loggedout');
		}
	
	}
	
}


?>