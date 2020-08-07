<?php
function getRandomString($length = 6) {
    $validCharacters = "ABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";
    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
    return $result;
}

if(isset($_GET['upload'])){
	$get = explode(",", $_GET['upload']);
}
require_once "function.dbconnect.php";
require_once "class.resize.php";
require_once $get[7];
$object = new $get[5]();
$conn = tfs_dbconn();
$uploaddir = $object->upload_dir; 
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
$thumb = $uploaddir . "thumb_" . basename($_FILES['uploadfile']['name']); 
if($get[0] == 'upload'){
	if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
		if(isset($_GET['upload'])){
			$ext = explode(".", basename($_FILES['uploadfile']['name']));
			$resizeFile =  $uploaddir . $get[3] . "-" . $get[1] . "." . end($ext);
			$resizeThumb =  $uploaddir . "thumb_" . $get[3] . "-" . $get[1] . "." . end($ext);
			
			$image = new resize($file);
			$image->resizeImage($object->image_size[0], $object->image_size[1], $object->resize);
			$image->saveImage($resizeFile, 100);
			
			$thumb = new resize($resizeFile);
			$thumb->resizeImage($object->thumb_size[0], $object->thumb_size[1], 'crop');
			$thumb->saveImage($resizeThumb, 100);
			
			unlink($file);
			$qi = "UPDATE ".$object->table_name." SET ".$get[3]." = '".($get[3] . "-" . $get[1] . "." . end($ext))."' WHERE ".$object->field_list['pk']." = " . $get[1];
			
			mysql_query($qi) or die($qi);
			echo '<img src="../uploads/'. "thumb_" . $get[3] . "-" . $get[1] . "." . end($ext)."?" . basename($_FILES['uploadfile']['name']).'" alt="'. end($ext) . '" title="'.basename($_FILES['uploadfile']['name']).'"/>';
		}
	} else {
		echo "error";
	}
}else if($get[0] == 'insimg'){
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
		if(isset($_GET['upload'])){
		
			$rand = getRandomString($length = 6);
		
			$ext = explode(".", basename($_FILES['uploadfile']['name']));
			$resizeFile =  $uploaddir . $get[3] . "-" . $get[1] . $rand . "." . end($ext);
			$newFileName = $get[3] . "-" . $get[1] . $rand . "." . end($ext);
			$resizeThumb =  $uploaddir . "thumb_" . $get[3] . "-" . $get[1] . $rand . "." . end($ext);
			$newThumbName = "thumb_" . $get[3] . "-" . $get[1] . $rand . "." . end($ext);
			
			$image = new resize($file);
			$image->resizeImage($object->image_size[0], $object->image_size[1], $object->resize);
			$image->saveImage($resizeFile, 100);
			
			$thumb = new resize($resizeFile);
			$thumb->resizeImage($object->thumb_size[0], $object->thumb_size[1], 'crop');
			$thumb->saveImage($resizeThumb, 100);
			
			unlink($file);
			$ref = "";
			foreach($object->field_list as $key=>$value) {
				if(isset($object->field_list[$key]['reference']['value'])){
					$ref = $object->field_list[$key]['reference']['value'];
				}
			}
			
			$qi = "INSERT INTO ".$object->table_name." (". $ref . ", " .$get[3].") VALUES ('" . $get[1] . "', '".$newFileName."')";
			mysql_query($qi) or die($qi);
			$mysql_id = mysql_insert_id();
			
			echo '<img src="../uploads/'.$newThumbName."?" . basename($_FILES['uploadfile']['name']).'" alt="'. end($ext) . '" title="'.basename($_FILES['uploadfile']['name']).'"/>';
		}
	} else {
		echo "error";
	}


}
?>