<script language="javascript">

$(document).ready(function() {
	$("[class^=validate]").validationEngine({
		success :  false,
		failure : function() {}
	})
});


</script>
<?php
$contruct = $_GET['construct'];
$cls =		$_GET['cls'];
require_once "function.dbconnect.php";
require_once $contruct;
$object = new $cls();
$id = $_GET['id'];
$field = $_GET['field'];
$child = $_GET['child'];
$str = explode('__', $field);
$append = "";
if(isset($str[1])){
	$append = '__' . $str[1];
}
$url = $object->tfs_currentURL();
$base = explode("?", $url);
$base2 = explode("&id", $base[1]);
$get = "";
if(isset($base2[0]))
$get = $base2[0];

foreach($object->field_list as $key=>$value){
	if(isset($object->field_list[$key]['parent']) && $object->field_list[$key]['parent'] == $str[0]){
		echo $object->tfs_frmSelectReference($object->field_list[$key], $id, array($str[0], $id), $append, ('All '.$key .'\'s'), TRUE);
		if(isset($object->field_list[$key]['child']))
		echo '<script type="javascript">loadSubCat(document.getElementById(\''.$object->field_list[$key]['field'].'\').value,"'.$object->field_list[$key]['field'].$append.'","'.$object->field_list[$key]['child'].$append.'","'.$get.'");</script>';
	}
}

?> 