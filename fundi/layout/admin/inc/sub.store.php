<?php
require_once 'class.mysql.php';
class cls_store extends tfs_mysql {
    function __construct(){
		$this->conn 			= tfs_dbconn();
		$this->construct		= "sub.store.php";
		$this->cls				= "cls_store";
		$this->table_name       = 'dotfnb_user';
        $this->per_page   		= 10;
		$this->twidth			= '100%';
		$this->bulk_layout		= 'vertical';
		
		$this->upload_dir		= '../../uploads/';
		$this->image_size		= array(510,220);
		$this->thumb_size		= array(80,80);
		$this->resize			= 'landscape';
		
		$this->excerpt			= 40;
		$this->seperate			= ".";
		$this->pad				= "...";
		
		$this->like_html		= array('before'=>'', 'after'=>'');
		$this->match_html		= array('before'=>'', 'after'=>'');
		$this->search_html		= array('before'=>'', 'after'=>'');
		
		$this->order			= array('field'=>'', 'sort'=>'DESC');
		
		$this->options_title	= array(	'display'=>TRUE, 'bt'=>'', 'at'=>'', 'twidth'=>'110');
        $this->field_list      	= array(	'pk'=>'dotfnb_user_id', 
											'Username'=>array('field'=>'dotfnb_user_username', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required]', 'twidth'=>'180', 'where'=>'like'),
											'Password'=>array('field'=>'dotfnb_user_password', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>FALSE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required]', 'twidth'=>'180', 'where'=>'like'),
											'Store'=>array('field'=>'dotfnb_user_store', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required]', 'twidth'=>'180', 'where'=>'like'),
										);
											
		$this->options 			= array(	array('anchor'=>'<img src="images/delete-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Delete Record', 'class'=>'mouseover', 'get'=>'d', 'bonclick'=>'$.prompt(deleteSinglePrompt,{callback: tfs_singleDelete,buttons: { Cancel: \'Cancel\', Delete: \'', 'aonclick'=>'\'}});', 'message'=>'y'),
											array('anchor'=>'<img src="images/edit-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Edit Record', 'class'=>'update', 'get'=>'u')
											
											);

		$this->active 			= FALSE;
		$this->notify 			= NULL;
		$this->message			= 'dotfnb_user_store';
		//$this->view				= 'applicant_view';
    }
	
	public function __destruct() {
		mysql_close($this->conn);
	} 	 	 	
}


?>