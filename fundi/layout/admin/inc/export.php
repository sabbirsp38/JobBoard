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
	$where = "WHERE goldfields_response_date >= '".$_GET['after']."' AND goldfields_response_date <= '".$_GET['before']."' AND goldfields_response_attending = 'yes'";
}else{
	$where = "WHERE goldfields_response_attending = 'yes'";
}

//$eventQry = 'SELECT dotfnb_winner.* FROM dotfnb_winner '.$where;
$eventQry = 'SELECT dotfnb_winner.* FROM dotfnb_winner';

$eventRes = mysql_query($eventQry, $connDB) or die(mysql_error());
$eventRow = mysql_fetch_row($eventRes);
$file = 'export_'.$eventRow[0];
$filename = $file.'_'.date('Y-m-d').".xls";

header('Content-Disposition: attachment; filename="'.$filename.'"');
header("Content-Type: application/vnd.ms-excel");

$reAreaRes = mysql_query($eventQry, $connDB) or die(mysql_error());
$columnnames = array(
	'dotfnb_winner_date',
	'dotfnb_winner_name',
	'dotfnb_winner_said',
	'dotfnb_winner_contact',
	'dotfnb_winner_email',
	'dotfnb_winner_promo',
	'dotfnb_winner_code'
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
    <td colspan="6" height="57" width="1676" style="font-weight:bold; font-size:15px;">Dot FNB Winner Export<br />    </td>
  </tr>
  <tr height="68">
    <td width="84" style="font-weight:bold;border: 0.5pt solid #333;">Date</td>
    <td width="69" style="font-weight:bold;border: 0.5pt solid #333;">Name</td>
    <td width="102" style="font-weight:bold;border: 0.5pt solid #333;">ID Number</td>
    <td width="69" style="font-weight:bold;border: 0.5pt solid #333;">Contact Number</td>
    <td width="113" style="font-weight:bold;border: 0.5pt solid #333;">Email</td>
	<td width="113" style="font-weight:bold;border: 0.5pt solid #333;">Promo</td>
	<td width="113" style="font-weight:bold;border: 0.5pt solid #333;">Code</td>
  </tr>
</table>';
while($reAreaRow = mysql_fetch_assoc($reAreaRes)){
 # display field/column names as first row
 	$fieldnames = array(
 	$reAreaRow['dotfnb_winner_date'],
        $reAreaRow['dotfnb_winner_name'],
	$reAreaRow['dotfnb_winner_said'],
	$reAreaRow['dotfnb_winner_contact'],
	$reAreaRow['dotfnb_winner_email'],
	$reAreaRow['dotfnb_winner_promo'],
	$reAreaRow['dotfnb_winner_code']
 	);
 
   array_walk($fieldnames, 'cleanData');
   echo "<table><tr><td class=fieldstyle>".implode("</td><td class=fieldstyle>", array_values($fieldnames))."</td></tr></table>";
}// end while
?>