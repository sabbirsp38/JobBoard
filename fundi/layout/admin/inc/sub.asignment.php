<?php
require_once 'class.mysql.php';
class cls_asignment extends tfs_mysql {
    function __construct(){
		$this->conn 			= tfs_dbconn();
		$this->construct		= "sub.asignment.php";
		$this->cls				= "cls_asignment";
		$this->table_name       = 'user_category';
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
        $this->field_list      	= array(	'pk'=>'user_category_id', 
											'Judge'=>array('field'=>'user_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'textfld', 'reference'=>array('table'=>'user', 'value'=>'user_id', 'display'=>'user_name'),  'where'=>'match'),
											'Category'=>array('field'=>'category_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'validate[required] textfld', 'reference'=>array('table'=>'category', 'value'=>'category_id', 'display'=>'category_name'), 'where'=>'match'),
											'Subcategory'=>array('field'=>'subcategory_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'textfld', 'reference'=>array('table'=>'subcategory', 'value'=>'subcategory_id', 'display'=>'subcategory_name'),  'where'=>'match'),
											
										);
											
		$this->options 			= array(	array('anchor'=>'<img src="images/delete-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Delete Record', 'class'=>'mouseover', 'get'=>'d', 'bonclick'=>'$.prompt(deleteSinglePrompt,{callback: tfs_singleDelete,buttons: { Cancel: \'Cancel\', Delete: \'', 'aonclick'=>'\'}});', 'message'=>'y'),
											array('anchor'=>'<img src="images/edit-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Edit Record', 'class'=>'update', 'get'=>'u')
											
											);

		$this->active 			= FALSE;
		$this->notify 			= NULL;
		$this->message			= 'user_category_id';
		//$this->view				= 'applicant_view';
    }
	
	public function __destruct() {
		mysql_close($this->conn);
	} 	 	 	
}


?>