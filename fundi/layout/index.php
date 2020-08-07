
<?php 

include_once '../config/config.php'; 
include_once '../lib/Database.php'; 
include_once '../helpers/Formet.php'; 
include_once '../lib/Connection.php';
include_once '../lib/Session.php';
 Session::checkSession();
// $this->cache->clean(); 
if (isset($_GET['action']) && $_GET['action']=="logout" ) {
    
    Session::destroy();
  }
 

$db = new Database();
$fm = new Formet();
$uni_id = $_SESSION['uni_id'];
$date = time();
$next = $date+('86399');

 $query2 = "select time from tbl_user WHERE uni_id='$uni_id' ";
        $post2 = $db->select($query2);
        $result2= $post2 -> fetch_assoc();
        $time11 = $result2['time'];
         function timestampdiff($qw,$saw)
		{
		    $datetime1 = new DateTime("@$qw");
		    $datetime2 = new DateTime("@$saw");
		    $interval = $datetime1->diff($datetime2);
		    return $interval->format('%H h %I m');
		}
	  
	  $status =  timestampdiff($date, $time11);
      $dif = $time11-$date;
      if($dif>=0)
      {
      	$next = 0;
        $query1 = "select flag from tbl_user WHERE uni_id='$uni_id' ";
        $post1 = $db->select($query1);
        $result1= $post1 -> fetch_assoc();
        if($result1['flag']==1)
        {
        	
        	header("Location:ronganswer.php?status=$status;");
        }
      }
	  	$next = 0;
        $query1 = "select flag from tbl_user WHERE uni_id='$uni_id' ";
        $post1 = $db->select($query1);
        $result1= $post1 -> fetch_assoc();
        if($result1['flag']==1)
        {
        	
        	header("Location:ronganswer.php?status=$status;");
        }
        

 ?>


<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Layout</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.19.custom.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link type="text/css" href="css/BubbleEngineDemo.css" rel="stylesheet" />	
<link type="text/css" href="css/jquery.validationEngine.css" rel="stylesheet" />	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-BubbleEngine4.js"></script>
<script type="text/javascript" src="js/jquery.spritely-0.6.js"></script>
<script type="text/javascript" src="js/jquery.loadImages.1.1.0.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
	//Build Bubble Machines with the Bubble Engine ------------------------
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            300,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            300,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            300,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            300,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            900,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            900,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1140,
	  particleSourceY:            1200,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            1200,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            1500,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            1500,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            1500,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            1500,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});


	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            1800,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            1800,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});

	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            2000,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            1340,
	  particleSourceY:            2000,
	  particleAnimationDuration:  5000,
	  particleDirection:          'left',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            2000,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble2.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	var SoapBubbleMachineNumber1 = $('fn').BubbleEngine({
	  particleSizeMin:            122,
	  particleSizeMax:            122,
	  particleSourceX:            -124,
	  particleSourceY:            2000,
	  particleAnimationDuration:  5000,
	  particleDirection:          'right',
	  particleAnimationDuration:  6000,
	  particleAnimationVariance:  2000,
	  particleScatteringX:        800,
	  particleScatteringY:        500,
	  gravity:                    -100,
	  imgSource:                  'images/bubble1.png'
	});
	//Start Bubble Machine 1 ---------------------------------------------
	SoapBubbleMachineNumber1.addBubbles(7);
	
	jQuery.post( 'admin/ajax_get_prizes.php',
	{ 
		user_id: gup( 'user_id' )
	},
	function( response_prize ) {
		for (var key in response_prize) {
		   var obj = response_prize[key];
		   for (var prop in obj) {
			  if(prop == "prize" && obj[prop] == "Apple iPad"){
					document.getElementById('tot_ipad').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
					document.getElementById('tot_memory').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
					document.getElementById('tot_voucher500').value = obj['total'];
			  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
					document.getElementById('tot_voucher250').value = obj['total'];
			  }
		   }
		}
	});
	
  });
  
</script>
<script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
	
		$( "#dialog-message" ).dialog({
			modal: true,
			autoOpen: false,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function(){
				$('#start').fadeIn('slow');
			}
		});
		
		$( "#dialog-form-ipad" ).dialog({
			autoOpen: false,
			height: 560,
			width: 640,
			modal: true,
			open: function() {
				$("#ipad_user_id").val(gup('user_id'));
				jQuery.post( 'admin/ajax_get_prize_id.php',
				{ 
					user_id: gup( 'user_id' ),
					prize_name: "Apple iPad"
				},
				function( response_prize ) {
					$("#ipad_prize_id").val( response_prize );
				});
				$('#register_ipad').validationEngine();
				
				$("#ipad_name").val("");
				$("#ipad_said").val("");
				$("#ipad_email").val("");
				$("#ipad_contact").val("");
				$("#ipad_terms").prop("checked", false);
				$("#ipad_promo").prop("checked", false);
			},
			close: function() {
				$('#register_ipad').validationEngine('hide');
				document.getElementById('has_clicked').value = '0';
				document.getElementById('cprize1').value = '0';
				document.getElementById('cprize2').value = '0';
				document.getElementById('cprize3').value = '0';
				document.getElementById('cprize4').value = '0';
				
				jQuery.post( 'admin/ajax_get_prizes.php',
				{ 
					user_id: gup( 'user_id' )
				},
				function( response_prize ) {
					for (var key in response_prize) {
					   var obj = response_prize[key];
					   for (var prop in obj) {
						  if(prop == "prize" && obj[prop] == "Apple iPad"){
								document.getElementById('tot_ipad').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
								document.getElementById('tot_memory').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
								document.getElementById('tot_voucher500').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
								document.getElementById('tot_voucher250').value = obj['total'];
						  }
					   }
					}
				});
				$( "#dialog-message" ).dialog({ title: "Claim your prize" });
			}
		});
		
		$( "#dialog-form-memory" ).dialog({
			autoOpen: false,
			height: 560,
			width: 640,
			modal: true,
			open: function() {
				$("#memory_user_id").val(gup('user_id'));
				jQuery.post( 'admin/ajax_get_prize_id.php',
				{ 
					user_id: gup( 'user_id' ),
					prize_name: "Memory Stick"
				},
				function( response_prize ) {
					$("#memory_prize_id").val( response_prize );
				});
				$('#register_memory').validationEngine();
				$("#memory_name").val("");
				$("#memory_said").val("");
				$("#memory_email").val("");
				$("#memory_contact").val("");
				$("#memory_terms").prop("checked", false);
				$("#memory_promo").prop("checked", false);
			},
			close: function() {
				$('#register_memory').validationEngine('hide');
				document.getElementById('has_clicked').value = '0';
				document.getElementById('cprize1').value = '0';
				document.getElementById('cprize2').value = '0';
				document.getElementById('cprize3').value = '0';
				document.getElementById('cprize4').value = '0';
				
				jQuery.post( 'admin/ajax_get_prizes.php',
				{ 
					user_id: gup( 'user_id' )
				},
				function( response_prize ) {
					for (var key in response_prize) {
					   var obj = response_prize[key];
					   for (var prop in obj) {
						  if(prop == "prize" && obj[prop] == "Apple iPad"){
								document.getElementById('tot_ipad').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
								document.getElementById('tot_memory').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
								document.getElementById('tot_voucher500').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
								document.getElementById('tot_voucher250').value = obj['total'];
						  }
					   }
					}
				});
				$( "#dialog-message" ).dialog({ title: "Claim your prize" });
			}
		});
		
		$( "#dialog-form-voucher250" ).dialog({
			autoOpen: false,
			height: 560,
			width: 640,
			modal: true,
			open: function() {
				$("#voucher250_user_id").val(gup('user_id'));
				jQuery.post( 'admin/ajax_get_prize_id.php',
				{ 
					user_id: gup( 'user_id' ),
					prize_name: "R250 Gift Voucher"
				},
				function( response_prize ) {
					$("#voucher250_prize_id").val( response_prize );
				});
				$('#register_voucher250').validationEngine();
				$("#voucher250_name").val("");
				$("#voucher250_said").val("");
				$("#voucher250_email").val("");
				$("#voucher250_contact").val("");
				$("#voucher250_terms").prop("checked", false);
				$("#voucher250_promo").prop("checked", false);
			},
			close: function() {
				$('#register_voucher250').validationEngine('hide');
				document.getElementById('has_clicked').value = '0';
				document.getElementById('cprize1').value = '0';
				document.getElementById('cprize2').value = '0';
				document.getElementById('cprize3').value = '0';
				document.getElementById('cprize4').value = '0';
				
				jQuery.post( 'admin/ajax_get_prizes.php',
				{ 
					user_id: gup( 'user_id' )
				},
				function( response_prize ) {
					for (var key in response_prize) {
					   var obj = response_prize[key];
					   for (var prop in obj) {
						  if(prop == "prize" && obj[prop] == "Apple iPad"){
								document.getElementById('tot_ipad').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
								document.getElementById('tot_memory').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
								document.getElementById('tot_voucher500').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
								document.getElementById('tot_voucher250').value = obj['total'];
						  }
					   }
					}
				});
				$( "#dialog-message" ).dialog({ title: "Claim your prize" });
			}
		});
		
		$( "#dialog-form-voucher500" ).dialog({
			autoOpen: false,
			height: 560,
			width: 640,
			modal: true,
			open: function() {
				$("#voucher500_user_id").val(gup('user_id'));
				jQuery.post( 'admin/ajax_get_prize_id.php',
				{ 
					user_id: gup( 'user_id' ),
					prize_name: "R500 Gift Voucher"
				},
				function( response_prize ) {
					$("#voucher500_prize_id").val( response_prize );
				});
				$('#register_voucher500').validationEngine();
				$("#voucher500_name").val("");
				$("#voucher500_said").val("");
				$("#voucher500_email").val("");
				$("#voucher500_contact").val("");
				$("#voucher500_terms").prop("checked", false);
				$("#voucher500_promo").prop("checked", false);
				
			},
			close: function() {
				$('#register_voucher500').validationEngine('hide');
				document.getElementById('has_clicked').value = '0';
				document.getElementById('cprize1').value = '0';
				document.getElementById('cprize2').value = '0';
				document.getElementById('cprize3').value = '0';
				document.getElementById('cprize4').value = '0';
				
				jQuery.post( 'admin/ajax_get_prizes.php',
				{ 
					user_id: gup( 'user_id' )
				},
				function( response_prize ) {
					for (var key in response_prize) {
					   var obj = response_prize[key];
					   for (var prop in obj) {
						  if(prop == "prize" && obj[prop] == "Apple iPad"){
								document.getElementById('tot_ipad').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "Memory Stick"){
								document.getElementById('tot_memory').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R500 Gift Voucher"){
								document.getElementById('tot_voucher500').value = obj['total'];
						  } else if(prop == "prize" && obj[prop] == "R250 Gift Voucher"){
								document.getElementById('tot_voucher250').value = obj['total'];
						  }
					   }
					}
				});
				$( "#dialog-message" ).dialog({ title: "Claim your prize" });
			}
		});
		
	});
	
	function reg_ipad(){
		if(jQuery('#register_ipad').validationEngine('validate')){
			var fuser_id = gup( 'user_id' );
			var fprize_id = $("#ipad_prize_id").val();
			var fname = $("#ipad_name").val();
			var fsaid = $("#ipad_said").val();
			var femail = $("#ipad_email").val();
			var fcontact = $("#ipad_contact").val();
			var fterms = $("#ipad_terms").val();
			var fpromo = $("#ipad_promo").val(); 
			jQuery.post( 'admin/ajax_insert_winner.php',
			{ 
				user_id: fuser_id,
				prize_id: fprize_id,
				name: fname,
				said: fsaid,
				email: femail,
				contact: fcontact,
				terms: fterms,
				promo: fpromo
			},
			function( response_prize ) {
				$( "#dialog-form-ipad" ).dialog( "close" );
				$( "#dialog-message" ).html( response_prize );
				$( "#dialog-message" ).dialog( "open" );
			});
		}
	}
	
	function cancel_ipad(){
		$( "#dialog-form-ipad"  ).dialog( "close" );
	}
	
	function reg_memory(){
		if(jQuery('#register_memory').validationEngine('validate')){
			var fuser_id = gup( 'user_id' );
			var fprize_id = $("#memory_prize_id").val();
			var fname = $("#memory_name").val();
			var fsaid = $("#memory_said").val();
			var femail = $("#memory_email").val();
			var fcontact = $("#memory_contact").val();
			var fterms = $("#memory_terms").val();
			var fpromo = $("#memory_promo").val();
			jQuery.post( 'admin/ajax_insert_winner.php',
			{ 
				user_id: fuser_id,
				prize_id: fprize_id,
				name: fname,
				said: fsaid,
				email: femail,
				contact: fcontact,
				terms: fterms,
				promo: fpromo
			},
			function( response_prize ) {
				$( "#dialog-form-memory" ).dialog( "close" );
				$( "#dialog-message" ).html( response_prize );
				$( "#dialog-message" ).dialog( "open" );
			});
		}
	}
	
	function cancel_memory(){
		$( "#dialog-form-memory"  ).dialog( "close" );
	}
	
	function reg_voucher250(){
		if(jQuery('#register_voucher250').validationEngine('validate')){
			var fuser_id = gup( 'user_id' );
			var fprize_id =  $("#voucher250_prize_id").val();
			var fname = $("#voucher250_name").val();
			var fsaid = $("#voucher250_said").val();
			var femail = $("#voucher250_email").val();
			var fcontact = $("#voucher250_contact").val();
			var fterms = $("#voucher250_terms").val();
			var fpromo = $("#voucher250_promo").val();
			jQuery.post( 'admin/ajax_insert_winner.php',
			{ 
				user_id: fuser_id,
				prize_id: fprize_id,
				name: fname,
				said: fsaid,
				email: femail,
				contact: fcontact,
				terms: fterms,
				promo: fpromo
			},
			function( response_prize ) {
				$(  "#dialog-form-voucher250" ).dialog( "close" );
				$( "#dialog-message" ).html( response_prize );
				$( "#dialog-message" ).dialog( "open" );
			});
		}
	}
	
	function cancel_voucher250(){
		$( "#dialog-form-voucher250"  ).dialog( "close" );
	}
	
	function reg_voucher500(){
		if(jQuery('#register_voucher500').validationEngine('validate')){
			var fuser_id = gup( 'user_id' );
			var fprize_id = $("#voucher500_prize_id").val();
			var fname = $("#voucher500_name").val();
			var fsaid = $("#voucher500_said").val();
			var femail = $("#voucher500_email").val();
			var fcontact = $("#voucher500_contact").val();
			var fterms = $("#voucher500_terms").val();
			var fpromo = $("#voucher500_promo").val();
			jQuery.post( 'admin/ajax_insert_winner.php',
			{ 
				user_id: fuser_id,
				prize_id: fprize_id,
				name: fname,
				said: fsaid,
				email: femail,
				contact: fcontact,
				terms: fterms,
				promo: fpromo
			},
			function( response_prize ) {
				$( "#dialog-form-voucher500"  ).dialog( "close" );
				$( "#dialog-message" ).html( response_prize );
				$( "#dialog-message" ).dialog( "open" );
			});
		}
	}
	
	function cancel_voucher500(){
		$( "#dialog-form-voucher500"  ).dialog( "close" );
	}
	
	</script>
	<img src="images/bubble1.png" style="display:none"/>
	<img src="images/bubble2.png" style="display:none"/>
	<img src="images/orange-bubble-burst.png" style="display:none"/>
	<img src="images/turq-bubble-burst.png" style="display:none"/>
	<img src="images/start_btn.png" style="display:none"/>
</head>
<body style="margin:0;padding:0;">
<script type="text/javascript">
$.loadImages(['images/bubble1.png', 'images/bubble2.png', 'images/orange-bubble-burst2.png', 'images/turq-bubble-burst2.png', 'images/start_btn.png' ]);
</script>
<div class="container">
	<div class="row">
		<div class="topber">

			<div  class="col-lg-4 col-md-4 col-sm-4">
				<center><label style="font-size: 21px; float: left;">Your Refaral Link</label>
				<input readonly value="https://gntit.co.za/fundi/register_new.php?id=<?php// echo $uni_id; ?>" style="  color: black; "  id="myInput" type="text" >
				<button onclick="myFunction()" class="btn btn-success" style= " padding: 1px 19px;font-size: 34px;font-weight: 900;margin-top: 15px;margin-left: 0px;text-transform: uppercase; ">  Copy Link </button>

				</center>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<center>
					<a style="font-size: 25px;margin: 5px;font-weight: bold;" target="_blank" href="http://www.facebook.com/sharer.php?u=https://gntit.co.za/fundi/" class="btn btn-success">
				      <span class="icon icon-facebook" aria-hidden="true"></span>
				      <span class="share-title">Share On Facebook</span>
				    </a>
				    <a style="font-size: 25px;margin: 5px;font-weight: bold;" target="_blank" href="http://twitter.com/share?url=https://gntit.co.za/fundi/&amp;" class="btn btn-success">
				      <span class="icon icon-twitter" aria-hidden="true"></span>
				      <span class="share-title">Share On Tweet</span>
				    </a>
				</center>
			</div>

			<div  class="col-lg-4 col-md-4 col-sm-4">
				<?php
                            $query = "select * from tbl_user WHERE uni_id='$uni_id' ";
                            $post = $db->select($query);
                            $result= $post -> fetch_assoc();
                        ?>
                        <center>
                        	<h3><?php echo $result['name']; ?></h3>
                        	<a  class="btn btn-primary" href="?action=logout">Log Out</a>

                        </center>
			</div>


		</div>
<?php
                            // $query = "select * from tbl_user WHERE uni_id='$uni_id' ";
                            // $post = $db->select($query);
                            // $result= $post -> fetch_assoc();
                        ?>
			
			
			<!-- <ul class="headlist">
				<li><label style="float: left;font-size: 21px;margin-right: 20px;">Your Refaral Link</label>
					<br>
					 <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://gntit.co.za/fundi/" class="btn btn-success">
				      <span class="icon icon-facebook" aria-hidden="true"></span>
				      <span class="share-title">Share On Facebook</span>
				    </a>
				    <a target="_blank" href="http://twitter.com/share?url=https://gntit.co.za/fundi/&amp;" class="btn btn-success">
				      <span class="icon icon-twitter" aria-hidden="true"></span>
				      <span class="share-title">Share On Tweet</span>
				    </a>

				</li>
				<li><button onclick="myFunction()" class="btn btn-success" style= " padding: 15px 24px;font-size: 34px;font-weight: 900;float: left;margin-left: 64px;text-transform: uppercase; ">  Copy Link </button></li>
				<li style="margin-left: 150px;"><h1><?php echo $result['name']; ?></h1></li>
			    <li style="margin-left: 50px;"></li>
			</ul> -->

		<div id="wrapper">
			<div id=""></div>
			<div id="pop_the_dot">
				<div id="container">
					<div id="counter">Pops left: <span id="hud_pop">3</span></div>
				</div>
			</div>
			<!-- <div id="footer">
				<p class="first">* Competition is valid while stocks last. All prizes are immediate, except for the iPad which will be delivered within 48 hours of winning.</p>
				<p>Competition rules and Terms and Conditions apply and can be read here <a href="#" class="tnc">Competition rules and Terms and Conditions</a></p>
			</div> -->
			<!-- <div id="overlay"></div> -->
       </div>
	</div>
</div>
<input name="no_clicks" id="no_clicks" type="hidden" value="3" />
<input name="has_clicked" id="has_clicked" type="hidden" value="0" />
<input name="cprize1" id="cprize1" type="hidden" value="0" />
<input name="cprize2" id="cprize2" type="hidden" value="0" />
<input name="cprize3" id="cprize3" type="hidden" value="0" />
<input name="cprize4" id="cprize4" type="hidden" value="0" />
<input name="tot_ipad" id="tot_ipad" type="hidden" value="-1" />
<input name="tot_memory" id="tot_memory" type="hidden" value="-1" />
<input name="tot_voucher250" id="tot_voucher250" type="hidden" value="-1" />
<input name="tot_voucher500" id="tot_voucher500" type="hidden" value="-1" />
<div id="dialog-form-ipad" title="Register to claim your prize">
	<form name="register_ipad" id="register_ipad">
	<input name="ipad_user_id" id="ipad_user_id" type="hidden" value="" />
	<input name="ipad_prize_id" id="ipad_prize_id" type="hidden" value="" />
	<div id="text_ipad"></div>
	<div id="large_icon_ipad"></div>
	<fieldset>
		<label for="ipad_name"><strong>Name and surname:</strong></label><br/>
		<input type="text" name="ipad_name" id="ipad_name" class="validate[required] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="ipad_email"><strong>Email:</strong></label><br/>
		<input type="text" name="ipad_email" id="ipad_email" value="" class="validate[required,custom[email]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_email"><strong>Cellphone:</strong></label><br/>
		<input type="text" name="ipad_contact" id="ipad_contact" value="" class="validate[required,maxSize[10],minSize[10],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="ipad_said"><strong>SA ID Number:</strong></label><br/>
		<input type="text" name="ipad_said" id="ipad_said" value="" class="validate[required,maxSize[13],minSize[13],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/>
		<input name="ipad_terms" id="ipad_terms" type="checkbox" value="yes" class="validate[required] checkbox" style="width:30px;position:relative;top:8px;"/><span>I am not a FRB or FNB employee and I have read the terms and conditions.</span><br/>
		<input name="ipad_promo" id="ipad_promo" type="checkbox" value="yes" style="width:30px;position:relative;top:8px;"/><span>Yes, I would like to receive promotional items from dotFNB.</span><br/>
	</fieldset><br/>
	<input name="ipad_cancel" id="ipad_cancel" type="button" class="ipad_cancel" onclick="cancel_ipad();"/>
	<input name="ipad_register" id="ipad_register" type="button" class="ipad_register" onclick="reg_ipad();"/>
	
	</form>
</div>

<div id="dialog-form-memory" title="Register to claim your prize">
	<form name="register_memory" id="register_memory">
	<input name="memory_user_id" id="memory_user_id" type="hidden" value="" />
	<input name="memory_prize_id" id="memory_prize_id" type="hidden" value="" />
	<div id="text_memory"></div>
	<div id="large_icon_memory"></div>
	<fieldset>
		<label for="memory_name"><strong>Name and surname:</strong></label><br/>
		<input type="text" name="memory_name" id="memory_name" class="validate[required] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="memory_email"><strong>Email:</strong></label><br/>
		<input type="text" name="memory_email" id="memory_email" value="" class="validate[required,custom[email]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_email"><strong>Cellphone:</strong></label><br/>
		<input type="text" name="memory_contact" id="memory_contact" value="" class="validate[required,maxSize[10],minSize[10],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="memory_said"><strong>SA ID Number:</strong></label><br/>
		<input type="text" name="memory_said" id="memory_said" value="" class="validate[required,maxSize[13],minSize[13],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/>
		<input name="memory_terms" id="memory_terms" type="checkbox" value="yes" class="validate[required] checkbox" style="width:30px;position:relative;top:8px;"/><span>I am not a FRB or FNB employee and I have read the terms and conditions.</span><br/>
		<input name="memory_promo" id="memory_promo" type="checkbox" value="yes" style="width:30px;position:relative;top:8px;"/><span>Yes, I would like to receive promotional items from dotFNB.</span><br/>
	</fieldset><br/>
	<input name="memory_cancel" id="memory_cancel" type="button" class="memory_cancel" onclick="cancel_memory();"/>
	<input name="memory_register" id="memory_register" type="button" class="memory_register" onclick="reg_memory();"/>
	
	</form>
</div>

<div id="dialog-form-voucher500" title="Register to claim your prize">
	<form name="register_voucher500" id="register_voucher500" >
	<input name="voucher500_user_id" id="voucher500_user_id" type="hidden" value="" />
	<input name="voucher500_prize_id" id="voucher500_prize_id" type="hidden" value="" />
	<div id="text_voucher500"></div>
	<div id="large_icon_voucher500"></div>
	<fieldset>
		<label for="voucher500_name"><strong>Name and surname:</strong></label><br/>
		<input type="text" name="voucher500_name" id="voucher500_name" class="validate[required] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher500_email"><strong>Email:</strong></label><br/>
		<input type="text" name="voucher500_email" id="voucher500_email" value="" class="validate[required,custom[email]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_email"><strong>Cellphone:</strong></label><br/>
		<input type="text" name="voucher500_contact" id="voucher500_contact" value="" class="validate[required,maxSize[10],minSize[10],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher500_said"><strong>SA ID Number:</strong></label><br/>
		<input type="text" name="voucher500_said" id="voucher500_said" value="" class="validate[required,maxSize[13],minSize[13],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/>
		<input name="voucher500_terms" id="voucher500_terms" type="checkbox" value="yes" class="validate[required] checkbox" style="width:30px;position:relative;top:8px;"/><span>I am not a FRB or FNB employee and I have read the terms and conditions.</span><br/>
		<input name="voucher500_promo" id="voucher500_promo" type="checkbox" value="yes" style="width:30px;position:relative;top:8px;"/><span>Yes, I would like to receive promotional items from dotFNB.</span><br/>
	</fieldset><br/>
	<input name="voucher500_cancel" id="voucher500_cancel" type="button" class="voucher500_cancel" onclick="cancel_voucher500();"/>
	<input name="voucher500_register" id="voucher500_register" type="button" class="voucher500_register" onclick="reg_voucher500();"/>
	
	</form>
</div>

<div id="dialog-form-voucher250" title="Register to claim your prize">
	<form name="register_voucher250" id="register_voucher250" >
	<input name="voucher250_user_id" id="voucher250_user_id" type="hidden" value="" />
	<input name="voucher250_prize_id" id="voucher250_prize_id" type="hidden" value="" />
	<div id="text_voucher250"></div>
	<div id="large_icon_voucher250"></div>
	<fieldset>
		<label for="voucher250_name"><strong>Name and surname:</strong></label><br/>
		<input type="text" name="voucher250_name" id="voucher250_name" class="validate[required] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_email"><strong>Email:</strong></label><br/>
		<input type="text" name="voucher250_email" id="voucher250_email" value="" class="validate[required,custom[email]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_email"><strong>Cellphone:</strong></label><br/>
		<input type="text" name="voucher250_contact" id="voucher250_contact" value="" class="validate[required,maxSize[10],minSize[10],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/><br/>
		<label for="voucher250_said"><strong>SA ID Number:</strong></label><br/>
		<input type="text" name="voucher250_said" id="voucher250_said" value="" class="validate[required,maxSize[13],minSize[13],custom[integer]] text-input ui-widget-content ui-corner-all" /><br/>
		<input name="voucher250_terms" id="voucher250_terms" type="checkbox" value="yes" class="validate[required] checkbox" style="width:30px;position:relative;top:8px;"/><span>I am not a FRB or FNB employee and I have read the terms and conditions.</span><br/>
		<input name="voucher250_promo" id="voucher250_promo" type="checkbox" value="yes" style="width:30px;position:relative;top:8px;"/><span>Yes, I would like to receive promotional items from dotFNB.</span><br/>
	</fieldset><br/>
	<input name="voucher250_cancel" id="voucher250_cancel" type="button" class="voucher250_cancel" onclick="cancel_voucher250();"/>
	<input name="voucher250_register" id="voucher250_register" type="button" class="voucher250_register" onclick="reg_voucher250();"/>
	
	</form>
</div>
<div id="dialog-message" title="Claim your prize">
</div>
<div id="prize1" style="display:none;position:absolute;z-index:80;"></div>
<div id="prize2" style="display:none;position:absolute;z-index:80;"></div>
<div id="prize3" style="display:none;position:absolute;z-index:80;"></div>
<div id="prize4" style="display:none;position:absolute;z-index:80;"></div>


<div id="terms" style="display:none;position:absolute;top:156px;height:393px;width:964px;z-index:90;">
<a href="#" class="close_tnc" style="position:relative; right:0">&laquo; Back to dotFNB Game</a>
<iframe width="1024" height="393" frameborder="0" src="terms.html" scrolling="no"></iframe>

</div>
<div id="start" style="/*margin-left: 11.5%;*/position:absolute;top:297px;height:2500px;width:1500px;z-index:90;    margin-top: -180px; background:url(css/ui-lightness/images/ui-bg_diagonals-thick_20_666666_40x40.png) ">
	<a href="#" id="start_game">Start</a>
</div>
<script>

$("#start_game").click(function() {
	document.getElementById('no_clicks').value = 3;
	$('#start').fadeOut('slow');
	$('#hud_pop').html(3);
});


$(".tnc").click(function() {
$('#terms').fadeIn('fast');
 $('#container').animate({opacity: 0.4}, 500);
});
$(".close_tnc").click(function() {
 $('#terms').fadeOut('fast');
  $('#container').animate({opacity: 1}, 500);
});


function myFunction() {
  var copyText = document.getElementById("myInput"); 
  copyText.style.display = "block";
   copyText.select();
  document.execCommand("copy");

}
</script>
</body>
</html>
