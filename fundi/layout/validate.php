<?php 
/*
CREATE TABLE IF NOT EXISTS `dotfnb_winner` (
  `dotfnb_winner_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dotfnb_user_id` int(11) NOT NULL,
  `dotfnb_prize_id` int(11) NOT NULL,
  `dotfnb_winner_date` date DEFAULT NULL,
  `dotfnb_winner_name` varchar(255) DEFAULT NULL,
  `dotfnb_winner_said` varchar(13) DEFAULT NULL,
  `dotfnb_winner_contact` varchar(127) DEFAULT NULL,
  `dotfnb_winner_email` varchar(255) NOT NULL,
  `dotfnb_winner_promo` varchar(255) NOT NULL,
  `dotfnb_winner_code` int(11) NOT NULL,
  PRIMARY KEY (`dotfnb_winner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

*/
$winner = FALSE;
if(isset($_POST['validate'])){
	$hostname_connDB			= "sql10.cpt1.host-h.net";
	$database_connDB			= "phpath_development";
	$username_connDB			= "phpath_14";
	$password_connDB 			= "m4VijWt8";
	
	$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database_connDB, $connDB);
	
	$query_existing = "SELECT `dotfnb_winner_id` ,
								`dotfnb_user_id` ,
								`dotfnb_prize_id` ,
								`dotfnb_winner_name`,
								`dotfnb_winner_said`,
								`dotfnb_winner_contact`,
								`dotfnb_winner_email`
	FROM `dotfnb_winner` WHERE `dotfnb_winner_code` = '".$_POST['code']."'";
	$result_existing = mysql_query($query_existing) or die(mysql_error());
	$row_existing = mysql_fetch_row($result_existing);
	$num_rows = mysql_num_rows($result_existing);
	
	if($num_rows > 0){
		$select_prize = "SELECT `dotfnb_prize_name` FROM `dotfnb_prize` WHERE `dotfnb_prize_id` = '".$row_existing[2]."'";
		$result_prize = mysql_query($select_prize) or die(mysql_error());
		$row_prize = mysql_fetch_row($result_prize);
		$select_store = "SELECT `dotfnb_user_store` FROM `dotfnb_user` WHERE `dotfnb_user_id` = '".$row_existing[1]."'";
		$result_store = mysql_query($select_store) or die(mysql_error());
		$row_store = mysql_fetch_row($result_store);
		$winner = TRUE;
		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pop The Dot</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
var fullscreen = false;
</script>
</head>
<body style="margin:0;padding:0;">
<input id="user_id" name="user_id" type="hidden" value="" />
<input id="ipad" name="ipad" type="hidden" value="" />
<input id="memory" name="memory" type="hidden" value="" />
<input id="voucher500" name="voucher500" type="hidden" value="" />
<input id="voucher250" name="voucher250" type="hidden" value="" />
<center>
<div id="login_wrapper">
	<div id="header"></div>
	<div id="pop_the_dot">
		<div id="container">
			<?php if(!$winner){ ?>
			
			<form id="login" name="login" method="post" action="">
				<h2 class="gamelogin" >Validate winner <span id="fsstatus"></span></h2> 
				<?php if(isset($_POST['validate'])) {
					echo "<p style='color:#ff9900'>The winner is invalid!</p>"; 
					}else {
					echo "<p>Please enter the winning code </p>";
					}?>
				
				<label>Winning code </label>
				<input type="text" name="code" id="code" class="" value="" >
				<input type="submit" value="" id="validate" name="validate" /> 
			</form>
			<?php } else {  ?><br/><br/>
			<table width="450px" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td colspan="2"><strong>The winner is valid.</strong></td>
			  </tr>
			  <tr>
				<td width="208">Store</td>
				<td width="242"><?php echo $row_store[0];?></td>
			  </tr>
			  <tr>
				<td>Prize</td>
				<td><?php echo $row_prize[0];?></td>
			  </tr>
			  <tr>
				<td>Players name:</td>
				<td><?php echo $row_existing[3];?></td>
			  </tr>
			  <tr>
				<td>Players SA ID:</td>
				<td><?php echo $row_existing[4];?></td>
			  </tr>
			  <tr>
				<td>Players Cellphone:</td>
				<td><?php echo $row_existing[5];?></td>
			  </tr>
			  <tr>
				<td>Players Email:</td>
				<td><?php echo $row_existing[6];?></td>
			  </tr>
			  <tr>
				<td colspan="2"><strong><a href="validate.php">&laquo; Go back</a></strong></td>
			  </tr>
			</table>
			<?php } ?>
<div id="terms" style="display:none;position:absolute;top:0;height:393px;width:964px;z-index:90; margin: 0 auto;text-align:left !important">
<a href="#" class="close_tnc" style="position:relative; right:0">&laquo; Back to dotFNB Game</a>
<iframe width="1024" height="393" frameborder="0" src="terms.html" scrolling="no"></iframe>
</div>
		</div>
	</div>
	<div id="footer">
		<p class="first">* Competition is valid while stocks last. All prizes are immediate, except for the iPad which will be delivered within 48 hours of winning.</p>
		<p>Competition rules and Terms and Conditions apply and can be read here <a href="#" class="tnc">Competition rules and Terms and Conditions</a></p>
	</div>
	<div id="overlay"></div>
</div></center>
</body>
</html>
