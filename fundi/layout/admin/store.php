<?php
require_once "inc/function.dbconnect.php";
require_once "inc/function.page.php";
require_once "inc/sub.store.php";
require_once "inc/class.secure.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dot FNB</title>
<?php include "head.php" ?>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="18" valign="top">
    	<div id="header"><h1 style="margin:20px;">Dot FNB</h1></div>
  	  <div id="nav">
		</div>
	</td>
  </tr>
  <tr>
    <td height="100%" valign="top">
		<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  			<tr>
   				<td width="300" valign="top" bgcolor="#00AAAD" >
					<div id="menu">
                    	<?php 
							$object = new tfs_secure();
							include "menu.php";
						?>
                    </div>			  
              </td>
				<td valign="top">
					<div id="content">
                    	<?php	
							$object->tfs_secure('store', 'login');
						?>
                    </div>
   				</td>
  			</tr>
	  </table>
	</td>
  </tr>
</table>
</body>
</html>
