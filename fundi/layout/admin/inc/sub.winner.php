<?php
require_once 'class.mysql.php';
//$selectlist = array('Option1'=>'1', 'Option2'=>'2', 'Option3'=>'3');
class cls_winner extends tfs_mysql {
    // additional class variables 
    function __construct(){
		$this->conn 			= tfs_dbconn();
		$this->construct		= "sub.winner.php";
		$this->cls				= "cls_winner";
		$this->table_name       = "dotfnb_winner";
        $this->per_page   		= 10;
		$this->twidth			= '100%';
		$this->bulk_layout		= 'vertical';
		
		$this->upload_dir		= '../../products/';
		$this->image_size		= array(600,400);
		$this->thumb_size		= array(80,80);
		$this->resize			= 'crop';
		
		$this->excerpt			= 10;
		$this->seperate			= ".";
		$this->pad				= "...";
		
		$this->options_title	= array(	'display'=>TRUE, 'bt'=>'', 'at'=>'', 'twidth'=>'110');
        $this->field_list      	= array(	'pk'=>'dotfnb_winner_id', 
											'Date'=>array('field'=>'dotfnb_winner_date', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required] textfld', 'twidth'=>'140', 'where'=>'like'),
											'Name'=>array('field'=>'dotfnb_winner_name', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required] textfld', 'twidth'=>'140','where'=>'like'),
											'ID'=>array('field'=>'dotfnb_winner_said', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'textfield', 'formclass'=>'validate[required] textfld', 'twidth'=>'140','where'=>'like'),
											'Store'=>array('field'=>'dotfnb_user_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'validate[required] textfld', 'reference'=>array('table'=>'dotfnb_user', 'value'=>'dotfnb_user_id', 'display'=>'dotfnb_user_store'), 'where'=>'match'),
											'Prize'=>array('field'=>'dotfnb_prize_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'validate[required] textfld', 'reference'=>array('table'=>'dotfnb_prize', 'value'=>'dotfnb_prize_id', 'display'=>'dotfnb_prize_name'), 'where'=>'match'),
											
											);
											
		$this->options 			= array(	array('anchor'=>'<img src="images/delete-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Delete Record', 'class'=>'mouseover', 'get'=>'d', 'bonclick'=>'$.prompt(deleteSinglePrompt,{callback: tfs_singleDelete,buttons: { Cancel: \'Cancel\', Delete: \'', 'aonclick'=>'\'}});', 'message'=>'y'),
											array('anchor'=>'<img src="images/edit-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Edit Record', 'class'=>'update', 'get'=>'u'),
											
											);
											
		
		$this->active 			= FALSE;
		$this->notify 			= NULL;
		
		
		$this->message			= 'dotfnb_winner_said';
		
    }
	
	public function __destruct() {
		mysql_close($this->conn);
	}
	
	
}


?>