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
											'Store'=>array('field'=>'dotfnb_user_id', 'bt'=>'', 'at'=>'', 'bf'=>'<div>', 'af'=>'</div>', 'display'=>TRUE, 'update'=>TRUE, 'form'=>'select', 'formclass'=>'validate[required] textfld', 'reference'=>array('table'=>'dotfnb_prize', 'value'=>'dotfnb_prize_id', 'display'=>'dotfnb_prize_name'), 'where'=>'match'),
											
											);
											
		$this->options 			= array(	array('anchor'=>'<img src="images/delete-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Delete Record', 'class'=>'mouseover', 'get'=>'d', 'bonclick'=>'$.prompt(deleteSinglePrompt,{callback: tfs_singleDelete,buttons: { Cancel: \'Cancel\', Delete: \'', 'aonclick'=>'\'}});', 'message'=>'y'),
											array('anchor'=>'<img src="images/edit-color-32.png" />', 'link'=>$this->tfs_baseURL(), 'title'=>'Edit Record', 'class'=>'update', 'get'=>'u'),
											
											);
											
		
		$this->active 			= FALSE;
		$this->notify 			= NULL;
		
		
		$this->message			= 'award_title';
		
    }
	
	public function __destruct() {
		mysql_close($this->conn);
	}
	
	
	
	function tfs_mysqlNavigation($where){
		if(!isset($_SESSION['category_id'])) $_SESSION['category_id'] = 'all';
		if(!isset($_SESSION['subcategory_id'])) $_SESSION['subcategory_id'] = 'all';
		if(!isset($_SESSION['assign_id'])) $_SESSION['assign_id'] = 'all';
		if(!isset($_SESSION['complete_id'])) $_SESSION['complete_id'] = 'all';
		if(!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 'all';
		$cat2 = "";
		$subcat2 = "";
		$assign2 = "";
		$complete2 = "";
		$uid2 = "";
		$cat2_and = "";
		$subcat2_and = "";
		$assign2_and = "";
		$complete2_and = "";
		$uid2_and = "";
		
		if($_SESSION['category_id'] != 'all') {
			$cat2 = " `category_id` = '".$_SESSION['category_id']."'";
			$cat2_and = " AND";
		}
		if($_SESSION['subcategory_id'] != 'all') {
			$subcat2 = " `subcategory_id` = '".$_SESSION['subcategory_id']."'";
			$subcat2_and = " AND";
		}
		if($_SESSION['assign_id'] != 'all') {
			$assign2 = " `assign_id` = '".$_SESSION['assign_id']."'";
			$assign2_and = " AND";
		}
		if($_SESSION['complete_id'] != 'all' ){
			$complete2 = " `complete_id` = '".$_SESSION['complete_id']."'";
			$complete2_and = " AND";
		}
		if($_SESSION['user_id'] != 'all'){
			 $uid2 = " `user_id` = '".$_SESSION['user_id']."'";
			 $uid2_and = " AND";
		}
		if($_SESSION['user_id'] != 'all' && $_SESSION['complete_id'] != 'all' && $_SESSION['assign_id'] != 'all' && $_SESSION['subcategory_id'] != 'all' && $_SESSION['category_id'] != 'all'){
			$where = $cat2_and.$cat2.$subcat2_and.$subcat2.$assign2_and.$assign2.$complete2_and.$complete2.$uid2_and.$uid2;
		}else{
			$where = $cat2_and.$cat2.$subcat2_and.$subcat2.$assign2_and.$assign2.$complete2_and.$complete2.$uid2_and.$uid2;
		}
		$trimmed = ltrim($where, " AND");
		$where = " WHERE ".$trimmed;
		if($where == " WHERE ") $where = "";
		
		$pagination = $this->tfs_navArray($where);
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g =  $get['get'];
		
		if($pagination['totalpages'] > 0){
			$html = '<div id="pagenav">';
			$html .= '<form id="frmNavigation" name="frmNavigation" method="get" action="">';
			if(isset($g)){
				foreach($g as $k=>$v){
					$f = explode("=", $v);
					$html .= '<input type="hidden" id="'. $f[0] .'" name="' . $f[0] . '" value="' . $f[1] . '" />';
				}
			}
			$html .= '<span id="totalrec">' . $pagination['totalrecords'] . ' records </span><span id="perpage"><input name="r" id="r" type="text" size="4" maxlength="4" value="' . $r . '" class="smallfld" /> per page</span>  <span id="pageno"><input name="p" id="p" type="text" size="4" maxlength="4" value="' . $pagination['currentpage'] . '" class="smallfld" /> of ' . $pagination['totalpages'] . '</span>';
			$html .= '<div id="navbuttons">';
			$html .= ($pagination['currentpage'] != 1 ? '<a href="' . $pagination['firstlink'] . '">First</a>' : '<a>First</a>');
			$html .= ($pagination['currentpage'] > 1 ? '<a href="' . $pagination['prevlink'] . '">Prev</a>' : '<a>Prev</a>');
			$html .= ($pagination['currentpage'] < $pagination['totalpages'] ? '<a href="' . $pagination['nextlink'] . '">Next</a>' : '<a>Next</a>');
			$html .= ($pagination['currentpage'] != $pagination['totalpages'] ? '<a href="' . $pagination['lastlink'] . '">Last</a>' : '<a>Last</a>');
			$html .= '</div>';
			$html .= '<input type="submit" /></form>';
			$html .= '</div>';
			$html .= '<div style="clear:both"></div>';
			echo $html;
		}
	}
	
	
	function tfs_pagination($where="") {
		if(!isset($_SESSION['category_id'])) $_SESSION['category_id'] = 'all';
		if(!isset($_SESSION['subcategory_id'])) $_SESSION['subcategory_id'] = 'all';
		if(!isset($_SESSION['assign_id'])) $_SESSION['assign_id'] = 'all';
		if(!isset($_SESSION['complete_id'])) $_SESSION['complete_id'] = 'all';
		if(!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 'all';
		$cat2 = "";
		$subcat2 = "";
		$assign2 = "";
		$complete2 = "";
		$uid2 = "";
		$cat2_and = "";
		$subcat2_and = "";
		$assign2_and = "";
		$complete2_and = "";
		$uid2_and = "";
		
		if($_SESSION['category_id'] != 'all') {
			$cat2 = " `category_id` = '".$_SESSION['category_id']."'";
			$cat2_and = " AND";
		}
		if($_SESSION['subcategory_id'] != 'all') {
			$subcat2 = " `subcategory_id` = '".$_SESSION['subcategory_id']."'";
			$subcat2_and = " AND";
		}
		if($_SESSION['assign_id'] != 'all') {
			$assign2 = " `assign_id` = '".$_SESSION['assign_id']."'";
			$assign2_and = " AND";
		}
		if($_SESSION['complete_id'] != 'all' ){
			$complete2 = " `complete_id` = '".$_SESSION['complete_id']."'";
			$complete2_and = " AND";
		}
		if($_SESSION['user_id'] != 'all'){
			 $uid2 = " `user_id` = '".$_SESSION['user_id']."'";
			 $uid2_and = " AND";
		}
		if($_SESSION['user_id'] != 'all' && $_SESSION['complete_id'] != 'all' && $_SESSION['assign_id'] != 'all' && $_SESSION['subcategory_id'] != 'all' && $_SESSION['category_id'] != 'all'){
			$where = $cat2_and.$cat2.$subcat2_and.$subcat2.$assign2_and.$assign2.$complete2_and.$complete2.$uid2_and.$uid2;
		}else{
			$where = $cat2_and.$cat2.$subcat2_and.$subcat2.$assign2_and.$assign2.$complete2_and.$complete2.$uid2_and.$uid2;
		}
		$trimmed = ltrim($where, " AND");
		$where = " WHERE ".$trimmed;
		if($where == " WHERE ") $where = "";
		
		
		$pk = $this->field_list['pk'];
		
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
		
		// The actions menu
		$html = '<div id="actions" ><ul>
			<li><a href="?n=new&p='.$p.'&r='.$r.'" >Single Insert</a></li>
			<li><a  href="#" onclick="$.prompt(ins,{callback: insertBulk,buttons: { Cancel: \'Cancel\', Insert: \'Insert\' }});" class="mouseover" >Bulk Insert</a></li>
			<li><a href="javascript:tfs_actionUpdate();" class="update-bulk">Update Selected</a></li>
			<li><a href="javascript:tfs_actionDelete();" class="delete-bulk">Delete Selected</a></li>
			';
		
		if(isset($this->pg_extra)){
			foreach($this->pg_extra as $key=>$value) {
				$pg = (isset($_GET['p']) ? 'p='.$_GET['p'].'&' : '');
						$rg = (isset($_GET['r']) ? 'r='.$_GET['r'].'&' : '');
						if(isset($value['title']))
						$title = 'title="'.$value['title'].'"';
						$fld="";
						$cls="";
						$fle="";
						$attr="";
						if(isset($value['field'])){
							$fld="&field=".$value['field'];
						}
						if(isset($value['cls'])){
							$cls="&cls=".$value['cls'];
						}
						if(isset($value['file'])){
							$fle="&fle=".$value['file'];
							$pg = "";
							$rg = "";
						}
						if(isset($value['attr'])){
							$attr="&attr=".$value['attr'];
							$pg = "";
							$rg = "";
						}
						$html .= (isset($value['message']) && isset($this->message) 
						? "<li><a href=\"#\" class=\"$value[class]\" onclick=\"$value[bonclick]$pg$rg$value[get]=$rows[$pk]$value[aonclick]\" $title >$value[anchor]</a></li>" 
						: "<li><a href=\"$value[link]?$pg$rg$value[get]=true$fld$cls$fle$attr\" $title>$value[anchor]</a></li>");
						
			}
		}	
			
		$html .= '</ul></div>';
		// Begin the html string
		$html .= "\n<form id=\"tfs_pagination\" name=\"tfs_pagination\" method=\"post\" action=\"?p=$p&r=$r\"> \n";
		$twidth = (isset($this->twidth) ? 'width="'.$this->twidth.'"' : '');
		$html .= "\t<table $twidth ><thead> \n";
		$html .= "\t\t<tr> \n";
		$html .= "\t\t\t<th width=\"12\" ><input type=\"checkbox\" id=\"chk_all\" name=\"chk_all\" value=\"all\" onchange=\"tfs_selectAll()\" /><input name=\"action\" id=\"action\" type=\"hidden\" value=\"\"></th> \n";	
			
		foreach($this->field_list as $key=>$value) {
			if(is_array($value) && isset($this->field_list[$key]['display']) && $this->field_list[$key]['display'] == TRUE) {
				$twidth = (isset($this->field_list[$key]['twidth']) ? 'width="'.$this->field_list[$key]['twidth'].'"' : '');
				$html .= "\t\t\t<th $twidth >$value[bt]$key$value[at]</th> \n";
			}
		}
		
		// The options column
		if(isset($this->options_title['display']) && $this->options_title['display'] == TRUE) {
			$twidth = (isset($this->options_title['twidth']) ? 'width="'.$this->options_title['twidth'].'"' : '');
			$html .= "\t\t\t<th $twidth >{$this->options_title['bt']}Options{$this->options_title['at']}</th> \n";	
		}
		$html .= "\t\t</tr></thead> \n";
	
		//Parse the $columns array
		$col = $pk . ", ";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['display']) && $this->field_list[$key]['display'] == TRUE)
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		
		$qc = "SELECT COUNT($pk) AS total FROM $this->table_name " . $where;
		$mysql = mysql_query($qc) or die($qc);
		$tr = mysql_result($mysql,0);
		$tp = ceil($tr / $r); 
		if($tp > 0){
			// Set the page based on the limit just incase the user enters an invalid page number
			if(isset($_GET['p']) && $_GET['p'] > $tp) {
				$l = ($tp - 1) * $r;
				$p = $tp;
			}else if(isset($_GET['p'])){
				$p = $_GET['p'];
				$l = ($p - 1) * $r; 
			}else{
				$p = 1;
				$l = ($p - 1) * $r; 
			}
			// Get the page data
			$ql = "SELECT $col FROM $this->table_name ";
			if($where != NULL) $ql .= " $where" ;
			$ql .= " ORDER BY `award_total_score` DESC LIMIT " . $l . ",$r";
			$mysql = mysql_query($ql) or die(mysql_error());
			
			// Output the table rows
			$rc = 0;
			$html .= "<tbody>";
			while($rows = mysql_fetch_array($mysql)){
			
				// Alternate the styles for every second row		
				$rc += 1;
				if($rc == 2){
					$html .= "\t\t<tr class=\"odd\"> \n";
					$rc = 0;
				}else{
					$html .= "\t\t<tr> \n";
				}
				
				// The columns to display
				$html .= "\t\t\t<th width=\"12\" ><input type=\"checkbox\" id=\"chk_$rows[$pk]\" name=\"chk_$rows[$pk]\" value=\"$rows[$pk]\" class=\"chk\" /></th> \n";	
				foreach($this->field_list as $key=>$value){
					if(is_array($value) && isset($this->field_list[$key]['display']) && $this->field_list[$key]['display'] == TRUE) {
						if(isset($this->field_list[$key]['reference'])){
							if(empty($this->field_list[$key]['reference']['static'])){
								$html .= "\t\t\t<td>" . $this->tfs_getReference($rows[$this->field_list[$key]['field']], $this->field_list[$key]['reference']) . "</td> \n"; 
							}else{
								$html .= "\t\t\t<td>" . $this->field_list[$key]['bf'] . $rows[$this->field_list[$key]['field']] . $this->field_list[$key]['af'] . "</td> \n";
							}
						} else if(isset($this->field_list[$key]['bool'])){
							if($rows[$this->field_list[$key]['field']] == $this->field_list[$key]['checkvalue']['checked']){
								$html .= "\t\t\t<td>" . $this->field_list[$key]['bool']['true'] . "</td> \n";
							}else{
								$html .= "\t\t\t<td>" . $this->field_list[$key]['bool']['false'] . "</td> \n";
							}
						} else {
							if(isset($this->field_list[$key]['link'])){
								$html .= "\t\t\t<td>" . $this->field_list[$key]['bf'] . "<a onclick=\"".$this->field_list[$key]['link']['onclick']."('".$this->field_list[$key]['link']['innerHtml']."', ". $rows[$pk] .")\" >" . $rows[$this->field_list[$key]['field']] ."</a>". $this->field_list[$key]['af'] . "</td> \n";
							}else{
								
								$html .= "\t\t\t<td>" . $this->field_list[$key]['bf'] . $this->tfs_excerpt($rows[$this->field_list[$key]['field']], $this->excerpt, $this->pad) . $this->field_list[$key]['af'] . "</td> \n";
							}
						}
					} 	
				}
				
				// Apend the options column
				if($this->options != NULL) {
					$html .= "\t\t\t<td>";
					foreach($this->options as $key=>$value) {
						$pg = (isset($_GET['p']) ? 'p='.$_GET['p'].'&' : '');
						$rg = (isset($_GET['r']) ? 'r='.$_GET['r'].'&' : '');
						if(isset($value['title']))
						$title = 'title="'.$value['title'].'"';
						$fld="";
						$cls="";
						$fle="";
						if(isset($value['field'])){
							$fld="&field=".$value['field'];
						}
						if(isset($value['cls'])){
							$cls="&cls=".$value['cls'];
						}
						if(isset($value['file'])){
							$fle="&fle=".$value['file'];
							$pg = "";
							$rg = "";
						}
						$html .= (isset($value['message']) && isset($this->message) 
						? "<a href=\"#\" class=\"$value[class]\" onclick=\"$value[bonclick]$pg$rg$value[get]=$rows[$pk]$value[aonclick]\" $title >$value[anchor]</a>" 
						: "<a href=\"$value[link]?$pg$rg$value[get]=$rows[$pk]$fld$cls$fle\" $title>$value[anchor]</a>");
						
					}
					$html .= "</td> \n";
				}
				$html .= "\t\t</tr> \n";
			}
			$html .= "</tbody>";
			$meta = array();
			$meta['totalrecords'] = $tr;
			$meta['totalpages'] = $tp;
			$meta['currentpage'] = $p;
			
			if($tp > 1){
			
				$url = $this->tfs_currentURL();
				$base = explode("?", $url);
				$prev = $p - 1;
				$next = $p + 1;
				
				$meta['prevlink'] = ($p > 1 ? $prevlink = $base[0] . '?p=' . $prev . '&r=' . $r : $prevlink = '');
				$meta['nextlink'] = ($p < $tp ? $nextlink = $base[0] . '?p=' . $next . '&r=' . $r : $nextlink = '');
				$meta['firstlink'] = ($p != 1 ? $firstlink = $base[0] . '?p=1' . '&r=' . $r : $firstlink = '');
				$meta['lastlink'] = ($p != $tp ? $lastlink = $base[0] . '?p=' . $tp . '&r=' . $r : $lastlink = '');
			
			}
			
			$html .= "\t</table> \n";
			$html .= "</form> \n";
		}else{
			$twidth = (isset($this->twidth) ? 'width="'.$this->twidth.'"' : '');
			
			$html = '<div id="actions"><ul>
				<li><a href="?n=new&p='.$p.'&r='.$r.'" >Single Insert</a></li>
				<li><a  href="#" onclick="$.prompt(ins,{callback: insertBulk,buttons: { Cancel: \'Cancel\', Insert: \'Insert\' }});" class="mouseover" >Bulk Insert</a></li>
				</ul></div>';
			$html .= "\t<table $twidth \ \n";
			$html .= "\t\t<tr> \n";
			$html .= "\t\t<td>No records to display. \n";
			$html .= "\t\t</td> \n";
			$html .= "\t\t</tr> \n";
			$html .= "\t\t</table> \n";
		}
		echo $html;
	}
	
	
	
}


?>