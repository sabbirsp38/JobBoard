<?php
header("Expires: Mon, 26 Jul 2021 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/xml; charset=utf-8");
require_once "function.dbconnect.php";
require_once $_GET['file'];
$object = new $_GET['class']();
global $link;
$link = tfs_dbconn();
function db_error($query, $errno, $error) {
	die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[STOP]</font></small><br><br></b></font>');
}
//Function to query the database.
function db_query($query, $link = 'db_link') {
	global $link;
	$result = mysql_query($query, $link) or die($query);
	return $result;
}
//Get a row from the database query
function db_fetch_array($db_query) {
	return mysql_fetch_array($db_query, MYSQL_ASSOC);
}
//The the number of rows returned from the query.
function db_num_rows($db_query) {
	return mysql_num_rows($db_query);
}
//Get the last auto_increment ID.
function db_insert_id() {
	return mysql_insert_id();
}
//Add HTML character incoding to strings
function db_output($string) {
	return htmlspecialchars($string);
}
//Add slashes to incoming data
function db_input($string, $link = 'db_link') {
	global $link;
	if (function_exists('mysql_real_escape_string')) {
		return mysql_real_escape_string($string, $link);
	} elseif (function_exists('mysql_escape_string')) {
		return mysql_escape_string($string);
	}
	return addslashes($string);
}

if (isset($_GET['search']) && $_GET['search'] != '') {
	$search = addslashes($_GET['search']);
	
	$union = "";
	foreach($object->field_list as $key=>$value){
		if(is_array($value) && isset($object->field_list[$key]['suggest']) && $object->field_list[$key]['suggest'] == TRUE) {
			$union .= "SELECT distinct(".$object->field_list[$key]['field'].") as suggest FROM ".$object->table_name ." WHERE ".$object->field_list[$key]['field']." like('%" . $search . "%') ";
			$union .= " UNION ";
		}
	}
	$union = rtrim($union, ' UNION ');
	$union .= "ORDER BY suggest";
	$suggest_query = db_query($union);
	while($suggest = db_fetch_array($suggest_query)) {
		if($suggest['suggest'] != "" && $suggest['suggest'] != "\n"){
			echo $suggest['suggest'] . "\n";
		}
	}
	
}

?>