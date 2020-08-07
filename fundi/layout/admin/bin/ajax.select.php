<?php
$dbconnect = '../inc/function.dbconnect.php';
if (file_exists($dbconnect)) {
	include_once $dbconnect;
	if (function_exists('tfs_dbconn')) {
		tfs_dbconn();
		$tables = "SHOW TABLES";
		$mysql = mysql_query($tables) or die(mysql_error());
		echo '<label>Table<select name="form_" id="form_" >';
		while($rows = mysql_fetch_array($mysql)){
			foreach($rows as $key=>$value){
				$title = $key;
				break;
			}
			echo '<option value="'.$rows[$title].'">'.$rows[$title].'</option>';
				  
		}
		echo '</select></label>';
		echo '<div id="value"></div>';
		echo '<div id="display"></div>';
	}
}
?>
