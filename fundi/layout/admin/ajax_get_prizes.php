<?php
session_start();
$hostname_connDB			= "sql10.cpt1.host-h.net";
$database_connDB			= "phpath_development";
$username_connDB			= "phpath_14";
$password_connDB 			= "m4VijWt8";

$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connDB, $connDB);

$query_prizes = "SELECT `dotfnb_prize_id`,`dotfnb_prize_name`,`dotfnb_prize_total` FROM `dotfnb_prize` WHERE `dotfnb_user_id` = '2'";
$result_prize = mysql_query($query_prizes);
$array = array();
while ($row_prize = mysql_fetch_assoc($result_prize)) {
		$the_pad = 0;
		if($row_prize['dotfnb_prize_id'] == 9 ){ // if its the ipad
			
				$select_mem = "SELECT `dotfnb_prize_total` FROM `dotfnb_prize` WHERE `dotfnb_prize_id` = '10'";
				$result_mem = mysql_query($select_mem);
				$row_mem = mysql_fetch_row($result_mem);
				if($row_mem[0] < 450){
					$select_ipad = "SELECT `dotfnb_prize_total` FROM `dotfnb_prize` WHERE `dotfnb_prize_id` = '9'";
					$result_ipad = mysql_query($select_ipad);
					$row_ipad = mysql_fetch_row($result_ipad);
					$the_pad = $row_ipad[0];
				} 
		} else{
			$the_pad = $row_prize['dotfnb_prize_total'];
		}

		$array[] = array( 'prize' => $row_prize['dotfnb_prize_name'], 'id' => $row_prize['dotfnb_prize_id'], 'total' => $the_pad );
}
$response = json_encode($array);

header( "Content-Type: application/json" );
echo $response;
exit;
?>