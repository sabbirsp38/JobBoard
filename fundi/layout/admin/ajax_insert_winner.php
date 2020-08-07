<?php

//Posts data to server and recieves response from server
//DO NOT EDIT unless you are sure of your changes
  function do_post_request($url, $data, $optional_headers = null)
  {
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = @stream_get_contents($fp);
     if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
     }
     $response;
     return formatXmlString($response);
     
  }

//takes the XML output from the server and makes it into a readable xml file layout
//DO NOT EDIT unless you are sure of your changes
function formatXmlString($xml) 
{  
  
  // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
  $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
  
  // now indent the tags
  $token      = strtok($xml, "\n");
  $result     = ''; // holds formatted version as it is built
  $pad        = 0; // initial indent
  $matches    = array(); // returns from preg_matches()
  
  // scan each line and adjust indent based on opening/closing tags
  while ($token !== false) : 
  
    // test for the various tag states
    
    // 1. open and closing tags on same line - no change
    if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) : 
      $indent=0;
    // 2. closing tag - outdent now
    elseif (preg_match('/^<\/\w/', $token, $matches)) :
      $pad--;
    // 3. opening tag - don't pad this one, only subsequent tags
    elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
      $indent=1;
    // 4. no indentation needed
    else :
      $indent = 0; 
    endif;
    
    // pad the line with the required number of leading spaces
    $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
    $result .= $line . "\n"; // add to the cumulative result, with linefeed
    $token   = strtok("\n"); // get the next token
    $pad    += $indent; // update the pad size for subsequent lines    
  endwhile; 
  
  return $result;
}


$hostname_connDB			= "sql10.cpt1.host-h.net";
$database_connDB			= "phpath_development";
$username_connDB			= "phpath_14";
$password_connDB 			= "m4VijWt8";

$connDB  = mysql_pconnect($hostname_connDB, $username_connDB, $password_connDB) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connDB, $connDB);

$query_existing = "SELECT `dotfnb_winner_id` FROM `dotfnb_winner` WHERE `dotfnb_winner_said` = '".$_POST['said']."' AND `dotfnb_winner_contact` = '".$_POST['contact']."'";
$result_existing = mysql_query($query_existing) or die(mysql_error());
$num_rows = mysql_num_rows($result_existing);

$query_prizes = "SELECT `dotfnb_prize_id`,`dotfnb_prize_name`,`dotfnb_prize_total` FROM `dotfnb_prize` WHERE `dotfnb_user_id` = '".$_POST['user_id']."' AND `dotfnb_prize_id` = '".$_POST['prize_id']."'";
	$result_prize = mysql_query($query_prizes) or die(mysql_error());
	$row_prize = mysql_fetch_row($result_prize);

if($num_rows == 0 && $row_prize[0] > 0){

	$winners_code = rand(100000, 999999);

	$insert_query = "INSERT INTO  `dotfnb_winner` (
	`dotfnb_user_id` ,
	`dotfnb_prize_id` ,
	`dotfnb_winner_date` ,
	`dotfnb_winner_name` ,
	`dotfnb_winner_said` ,
	`dotfnb_winner_contact`,
	`dotfnb_winner_email`,
	`dotfnb_winner_promo`,
	`dotfnb_winner_code`
	)
	VALUES (
	 '".$_POST['user_id']."',  
	 '".$_POST['prize_id']."',  
	 NOW(),  
	 '".$_POST['name']."',  
	 '".$_POST['said']."',  
	 '".$_POST['contact']."',
	 '".$_POST['email']."',
	 '".$_POST['promo']."',
	 '".$winners_code."'
	)";
	mysql_query($insert_query) or die(mysql_error());
	
	
	$decrement = $row_prize[2] - 1;
	$update_prize = "UPDATE `dotfnb_prize` SET `dotfnb_prize_total` = '".$decrement."' WHERE `dotfnb_prize_id` = '".$row_prize[0]."'";
	mysql_query($update_prize) or die(mysql_error());
	
	//This code block can be customised. 
	//The $data array contains data that must be modified as per the API documentation. The array contains data that you will post to the server
	$data= array(
	"Type"=> "sendparam", 
	"Username" => "thatsitcom",
	"Password" => "thatsit006",
	"live" => "true",
	"numto" => $_POST['contact'],
	"data1" => "Congratulations! Your winning code is: " . $winners_code . ". This is the code used to claim your prize. Kind regards dotFNB." 
	) ; //This contains data that you will send to the server.
	
	$data = http_build_query( $data ); //builds the post string ready for posting
	do_post_request('http://www.mymobileapi.com/api5/http5.aspx', $data);  //Sends the post, and returns the result from the server.
	

/* Dru to update mail here */	
$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>dot FNB</title>
<style type="text/css">
body{
	font-size:12px;
	color:#333333;
	font-family:Arial, Helvetica, sans-serif;
}
p{
	padding:0 30px;
}
h3{
	padding:0 30px;
	color:#009999;
	font-size:16px;
}
a{
	color:#009999;
}

.links a {
	padding:0 14px;
}
.links {
	color:#009999;
	}
.light_grey {
	color:#989898;
	font-size:11px;
}

.facebook {
	background:url(http://php.thatsitcom.co.za/dotfnb/mail/icon_facebook.png) no-repeat;
	margin-right:7px;
	width:43px;
	height:43px;
	display:block;
	float:left;
}

.twitter {
	background:url(http://php.thatsitcom.co.za/dotfnb/mail/icon_twitter.png) no-repeat;
	margin-right:7px;
	width:43px;
	height:43px;
	display:block;
	float:left;
}

.google {
	background:url(http://php.thatsitcom.co.za/dotfnb/mail/icon_google.png) no-repeat;
	margin-right:7px;
	width:43px;
	height:43px;
	display:block;
	float:left;
}
.clear{
clear:both;
}
</style>
</head>

<body>
<div style="width: 800px;margin: 0 auto">
<table width="800px" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td height="160" background="http://php.thatsitcom.co.za/dotfnb/mail/header.png"><img src="http://php.thatsitcom.co.za/dotfnb/mail/header.png" width="800" height="160" /></td>
  </tr>
  <tr>
    <td height="234" background="http://php.thatsitcom.co.za/dotfnb/mail/header_image.png"><img src="http://php.thatsitcom.co.za/dotfnb/mail/header_image.png" width="800" height="234" /></td>
  </tr>
  <tr>
    <td background="http://php.thatsitcom.co.za/dotfnb/mail/bg.png" class="message">
		<p>Dear '.$_POST['name'].' </p>
		<h3>You just won with Pop the Dot from dot FNB! </h3>
		<p><strong>Congratulations on your prize!</strong><br/>
		</p>
		<p>Thanks for playing <strong>Pop the Dot</strong> with dot FNB!<br/>Terms and conditions can be read in-store.</p><br/>
		
	  </td>
  </tr>
  <tr class="light_grey">
    <td background="http://php.thatsitcom.co.za/dotfnb/mail/bg.png">
		<p>&copy; Copyright 2011, First National Bank - a division of FirstRand Bank Limited. An Authorised Financial Services and Credit Provider (NCRCP20).</p>
		<p>FNB will never ask you to login to online banking via a link in an email</p>	</td>
  </tr>
  <tr>
  <tr>
    <td height="26" background="http://php.thatsitcom.co.za/dotfnb/mail/footer.png"><img src="http://php.thatsitcom.co.za/dotfnb/mail/footer.png" width="800" height="26" /></td>
  </tr>
</table>
</div>
</body>
</html>';
/* Dru stop updating here use mail.html to paste here */	
	$subject = "dot FNB - Congratulations";
	$to = $_POST['email'];
	$from = "dotfnb@eventdetails.co.za";
	$headers = 'From: '. $from . " \r\n".'Reply-To: ' . $from . "\r\n".'Content-type: text/html; charset=us-ascii X-Mailer: PHP/'.phpversion();
	mail($to, $subject, $msg, $headers);
	
	echo "Your registration has been entered successfully. Please check your cellphone for your winning code to claim your prize.";
	
}else{

	echo "Each person can only win once. Sorry for the inconvenience.";

}
?>