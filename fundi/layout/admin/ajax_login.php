<?php
session_start();
$hostname_connDB			= "sql10.cpt1.host-h.net";
$database_connDB			= "phpath_development";
$username_connDB			= "phpath_14";
$password_connDB 			= "m4VijWt8";

$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connDB, $connDB);
	
$select_user = "SELECT `dotfnb_user_id`,`dotfnb_user_store` FROM `dotfnb_user` WHERE `dotfnb_user_username` = '".$_POST['username']."' AND `dotfnb_user_password` = '".$_POST['password']."'";
$result_user = mysql_query($select_user) or die(mysql_error());
$output = "";
if (mysql_num_rows($result_user) == 1){
	$row_user = mysql_fetch_row($result_user);
	$_SESSION['store'] = $row_user[1];
	$_SESSION['userid'] = $row_user[0];
	$output = $row_user[0];
}else{
	// Wrong credentials
	$output = 0;
}
echo $output;
?>