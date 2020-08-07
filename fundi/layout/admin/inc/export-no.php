<?php 
require_once 'function.dbconnect.php';
$connDB = tfs_dbconn();
function cleanData(&$str){
	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\n/", "\\n", $str);
  	$str = preg_replace("[<p>]", "", $str);
    $str = preg_replace("[</p>]", "", $str);
    $str = preg_replace("[<strong>]", "", $str);
  	$str = preg_replace("[</strong>]", "", $str);
  	$str = preg_replace("[<ul>]", "", $str);
  	$str = preg_replace("[</ul>]", "", $str); 
    $str = preg_replace("[<br />]", "", $str); 
    $str = preg_replace("[<li>]", "", $str); 
    $str = preg_replace("[</li>]", "", $str); 
 	$str = preg_replace("[<u>]", "", $str);
  	$str = preg_replace("[</u>]", "", $str);
} // end if 

$where = "";		
if(isset($_GET['before']) && isset($_GET['after'])){
	$where = "WHERE goldfields_response_date >= '".$_GET['after']."' AND goldfields_response_date <= '".$_GET['before']."' AND goldfields_response_attending = 'no'";
}else{
	$where = "WHERE goldfields_response_attending = 'no'";
}
$eventQry = 'SELECT goldfields_response.* FROM goldfields_response '.$where;

$eventRes = mysql_query($eventQry, $connDB) or die(mysql_error());
$eventRow = mysql_fetch_row($eventRes);
$file = 'export_'.$eventRow[0];
$filename = $file.'_'.date('Y-m-d').".xls";

header('Content-Disposition: attachment; filename="'.$filename.'"');
header("Content-Type: application/vnd.ms-excel");

$reAreaRes = mysql_query($eventQry, $connDB) or die(mysql_error());
$columnnames = array(
	'Date',
	'Name',
	'Partner Name',
	'Dietary',
	'Partner Dietary',
	'Email'
	);

?>
<style type="text/css">
<!--
.columnstyle { font: bold 12px Verdana, Arial, Helvetica, sans-serif; border: 1px solid #333; }
.columnheader { font: bold 12px Verdana, Arial, Helvetica, sans-serif; border: 0.5pt solid #333;}
.fieldstyle  { border: 0.5pt solid #333; text-align:left;mso-number-format:\@;}
-->
</style>
<?php
echo '<table cellspacing="0" cellpadding="0">
  <tr height="57">
    <td colspan="6" height="57" width="1676" style="font-weight:bold; font-size:15px;">Gold Fields - Annual Dinner<br />    </td>
  </tr>
  <tr height="68">
    <td width="84" style="font-weight:bold;border: 0.5pt solid #333;">Date</td>
    <td width="69" style="font-weight:bold;border: 0.5pt solid #333;">Name</td>
    <td width="102" style="font-weight:bold;border: 0.5pt solid #333;">Partner Name</td>
    <td width="69" style="font-weight:bold;border: 0.5pt solid #333;">Dietary</td>
    <td width="113" style="font-weight:bold;border: 0.5pt solid #333;">Partner Dietary</td>
	<td width="113" style="font-weight:bold;border: 0.5pt solid #333;">Email</td>
  </tr>
</table>';
while($reAreaRow = mysql_fetch_assoc($reAreaRes)){
 # display field/column names as first row
 	$fieldnames = array(
 	$reAreaRow['goldfields_response_date'],
    $reAreaRow['goldfields_response_firstname'],
	$reAreaRow['goldfields_response_partnername'],
	$reAreaRow['goldfields_response_dietary'],
	$reAreaRow['goldfields_response_partnerdietary'],
    $reAreaRow['goldfields_response_email']
 	);
 
   array_walk($fieldnames, 'cleanData');
   echo "<table><tr><td class=fieldstyle>".implode("</td><td class=fieldstyle>", array_values($fieldnames))."</td></tr></table>";
}// end while
?>