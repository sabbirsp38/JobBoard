<?php
ob_start();
function tfs_dbconn(){
	
	$hostname_connDB			= "sql10.cpt1.host-h.net";
	$database_connDB			= "phpath_development";
	$username_connDB			= "phpath_14";
	$password_connDB 			= "m4VijWt8";
	
	$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database_connDB, $connDB);
	return $connDB;
	
}

?>