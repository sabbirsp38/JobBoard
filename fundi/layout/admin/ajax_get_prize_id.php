<?php
session_start();
$hostname_connDB			= "sql10.cpt1.host-h.net";
$database_connDB			= "phpath_development";
$username_connDB			= "phpath_14";
$password_connDB 			= "m4VijWt8";

$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connDB, $connDB);
	
$select_prize = "SELECT `dotfnb_prize_id` FROM `dotfnb_prize` WHERE `dotfnb_prize_name` = '".$_POST['prize_name']."' AND `dotfnb_user_id` = '".$_POST['user_id']."'";
$result_prize = mysql_query($select_prize) or die(mysql_error());
$row_prize = mysql_fetch_row($result_prize);
echo $row_prize[0];
?>