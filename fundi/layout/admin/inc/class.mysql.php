<?php
// *****************************************************************************
// Author: T.F. Schuil [trevor@thatsitcom.co.za]
// Description: Retrieve, update and delete mysql
// *****************************************************************************

class tfs_mysql {
	var $conn;				// Connection variable
	var $db_host;			// database host
	var $db_name;           // database name
	var $db_username;		// database username
	var $db_password;		// database password
	var $table_name;        // table name
	var $field_list;        // An associative multidimetional array of fields
							// [pk]=> The primary key 
							// [0]=> An assiociative array
							//			The first key is the column title which is displayed 
							//			The first value is the field name in the mysql database
							//			[bt]=> html before column title
							//			[at]=> html after column title
							//			[bf]=> html before the field in the table
							//			[af]=> html after the field in the table
	var $per_page;     		// number of records per page
	var $options;			// An associative multidimetional array of fields
							// 			[anchor]=> The html displayed in the options column
							//			[link]=> The link for the anchor
							//			[get]=> The Get variable appended to the link
							//			[message]=> If 'y' will return a field value in $msg
	var $msg;			// The field used in the message returned from a function
	var $active;
	var $notify;
	// The constructor
	function __construct() {
	
		$this->conn = tfs_dbconn();
		
		$this->table_name      	= 'default'; 
    	$this->per_page   		= 10;
    	$this->field_list 		= array(	'pk'=>'CustomerID', 
											'1'=>array('title1'=>'CompanyName', 'bt'=>'<h3>', 'at'=>'</h3>', 'bf'=>'<span>', 'af'=>'</span>'),
											'2'=>array('title2'=>'ContactName', 'bt'=>'<h3>', 'at'=>'</h3>', 'bf'=>'<span>', 'af'=>'</span>'),
											'3'=>array('title3'=>'ContactTitle', 'bt'=>'<h3>', 'at'=>'</h3>', 'bf'=>'<span>', 'af'=>'</span>')
											);
		$this->options 			= array(	array('anchor'=>'Delete', 'link'=>$this->tfs_currentURL(), 'get'=>'d', 'message'=>'y'),
											array('anchor'=>'Update', 'link'=>$this->tfs_currentURL(), 'get'=>'u', 'message'=>'y'),
											array('anchor'=>'View', 'link'=>$this->tfs_currentURL(), 'get'=>'v')
											);
		$this->message			= 'default';
		$this->active = FALSE;
										
	}
	
	public function __destruct() {
		mysql_close($this->conn);
	}
	
	// *****************************************************************************
	// Description:	This function returns the url of the current page
	//
	// Arguments: 	None
	//
	// Returns: 	$pageURL - a string with the url of the current page
	// *****************************************************************************
	
	function tfs_currentURL(){
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80"){
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	// *****************************************************************************
	// Description:	This function returns the base url of the current page. Typically
	//				used in the contrutor method to set $options array. 
	//
	// Arguments: 	None
	//
	// Returns: 	$base - an array with the url seperated by ?
	// *****************************************************************************
	
	function tfs_baseURL(){
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80"){
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		$base = explode("?", $pageURL);
		return $base[0];
	}
	
	function tfs_getURL(){
		$get = NULL;
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80"){
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		$base = explode("?", $pageURL);
		$g = array();
		$pg = array();
		if(isset($base[1])){
			$b = explode("&", $base[1]);
			foreach($b as $key=>$value){
				if(preg_match("/p=/i", $b[$key])){
					$pg['p'] = str_replace("p=", "", $b[$key]);
				}else if(preg_match("/r=/i", $b[$key])) {
					$pg['r']  = str_replace("r=", "", $b[$key]);
				}else{
					if($b[$key] != '' && $b[$key] != NULL && !preg_match("/d=/i", $b[$key]) && !preg_match("/u=/i", $b[$key]) && !preg_match("/n=/i", $b[$key])){
						array_push($g, $b[$key]);
					}
				}
			}
			$get = array('pagination' => $pg, 'get' => $g);
		}
		return $get;
		
	}
	
	public function tfs_excerpt($text,$limit=20, $pad="..."){
		$explode = explode(' ',$text);
		$string  = '';
	
		$dots = $pad;
		if(count($explode) <= $limit){
			$dots = '';
		}
		for($i=0;$i<$limit;$i++){
			if(isset($explode[$i]))
			$string .= $explode[$i]." ";
		}
		if ($dots) {
			$string = substr($string, 0, strlen($string));
		}
	
		return $string.$dots;
	}
	public function tfs_sessionMatch(){
		$where = "";
		$like = "";
		$match = "";
		$count = 0;
		foreach($this->field_list as $key=>$value) {
			if(isset($value['where'])){
				if($value['where'] == "match"){
					if(isset($_POST[$this->field_list[$key]['field']]) && $_POST[$this->field_list[$key]['field']] != "" && isset($_POST['btn_where']) && $_POST[$this->field_list[$key]['field']] != "all"){
						$match .= $this->field_list[$key]['field'] . " = '" . $_POST[$this->field_list[$key]['field']] . "' AND ";
						$_SESSION[$this->field_list[$key]['field']] = $_POST[$this->field_list[$key]['field']];
						$count += 1;
					}else if (isset($_POST[$this->field_list[$key]['field']]) && $_POST[$this->field_list[$key]['field']] == "all"){
						$_SESSION[$this->field_list[$key]['field']] = $_POST[$this->field_list[$key]['field']];
					}
				}else if($value['where'] == "like"){
					if(isset($_POST['txt_search']) && $_POST['txt_search'] != "" && $_POST['txt_search'] != "Quick Search..."){
						$like .= $this->field_list[$key]['field'] . " LIKE '%" . $_POST['txt_search'] . "%' OR ";
						$_SESSION['txt_search'] = $_POST['txt_search'];
						$count += 1;
					}else{
						if(isset($_SESSION['txt_search']))
						unset($_SESSION['txt_search']);
					}
				}else if($value['where'] == "session" && isset($_SESSION['tfs_privelage']) && $_SESSION['tfs_privelage'] > 0){
					$match .= $this->field_list[$key]['field'] . " = '" . $_SESSION['tfs_userid'] . "' AND ";
					$count += 1;
				}
			}
		}
		if($count > 0) {
			$and = "";
			if($match != "")
			$match = "(" . rtrim($match, ' AND '). ")";
			if($like != "")
			$like = "(" . rtrim($like, ' OR ') . ")";
			if($match != "" && $like != "") $and = " AND ";
			
			$where = "WHERE " . $like . $and . $match;
		}
		return $where;
	}
	
	public function tfs_where(){
		$session = NULL;
		$html = "<form id=\"tfs_where\" name=\"tfs_where\" method=\"post\" action=\"\">";
		foreach($this->field_list as $key=>$value) {
			if(isset($_SESSION['txt_search'])) $session = $_SESSION['txt_search'];
			if(isset($value['where']) && $value['where'] == "like"){
				$html .= $this->like_html['before'];
				$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSuggestField('txt_search', $session, "txt_default") . $this->field_list[$key]['af'];
				$html .= $this->like_html['after'];
				break;
			}
		}
		$open = FALSE;
		foreach($this->field_list as $key=>$value) {
			
			if(isset($value['where']) && $value['where'] == "match"){
				if($open == FALSE){
					$html .= $this->match_html['before'];
					$open = TRUE;
				}
				
				$formclass = "frm_default";
				$parent = array();
				if(isset($_SESSION[$this->field_list[$key]['field']])) $session = $_SESSION[$this->field_list[$key]['field']];
		
				switch ($this->field_list[$key]['form']) {
					case 'select':
						
						if(empty($this->field_list[$key]['reference']['static'])){
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelectReference($this->field_list[$key], $session, $parent, NULL, ('All '.$key .'\'s')) . $this->field_list[$key]['af'];
							
						}else{
							$html .= $this->field_list[$key]['bf'] .$this->tfs_frmSelect($this->field_list[$key]['field'], $this->field_list[$key]['reference']['static'], $class=$formclass) . $this->field_list[$key]['af'];
						}
						
						break;
					default:
						$html .= $this->like_html['before'];
						$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextField($this->field_list[$key]['field'], $session, $formclass) . $this->field_list[$key]['af'];
						$html .= $this->like_html['after'];
						break;
				}
			}	
		}
		$html .= $this->match_html['after'];
		$html .= $this->search_html['before'];
		$html .= "<input type=\"submit\" name=\"btn_where\" id=\"btn_where\" value=\"Search\" />";
		$html .= $this->search_html['after'];
		$html .= "</form>";
		echo $html;
	}
	
	// *****************************************************************************
	// Description:	This function returns a single field from a table when a prmary
	//				key is specified. 
	//
	// Arguments: 	$pkv - the value of the primary key
	//				$field - the field name in the mysql table
	//
	// Returns: 	mysql_result - the value of the field stored in the table
	// *****************************************************************************
	
	public function tfs_getFieldValue($pkv, $field){
		$q = "SELECT $field FROM " .  $this->table_name . " WHERE " . $this->field_list['pk'] . " = $pkv";
		$mysql = mysql_query($q) or die(mysql_error());
		return mysql_result($mysql,0);
	}
	
	
	// *****************************************************************************
	// Description:	This function returns a single field from a seperate table 
	//				specified in the reference variable. Typically used to display 
	//				the value of a foreign key.
	//
	// Arguments: 	$pkv - the value of the primary key
	//				$reference - array
	//					[table]=> The table to get the values from
	//					[display]=> The field in the reference table to display
	//					[value]=> The primary key used in the where clause
	//
	// Returns: 	mysql_result - the value of the field stored in the reference 
	//				table
	// *****************************************************************************
	
	public function tfs_getReference($pkv, $reference) {
		if($pkv != '' && $pkv != NULL){
			$q = "SELECT $reference[display] FROM $reference[table] WHERE $reference[value] = $pkv";
			$mysql = mysql_query($q) or die(mysql_error());
			$num_rows = mysql_num_rows($mysql);
			if($num_rows > 0)
			return mysql_result($mysql, 0);
		}
	}
	
	// *****************************************************************************
	// Description:	This function iterates through all values in an array and runs
	//				the mysql_real_escape_string() function to insure valid data will
	//				be passed to mysql.
	//
	// Arguments: 	$array - an array of user input e.g. $_POST
	//
	// Returns: 	$array - an array will acceptable date to pass to mysql
	// *****************************************************************************
	
	public function filterParameters($array) {
		// Check if the parameter is an array
		if(is_array($array)) {
			// Loop through the initial dimension
			foreach($array as $key => $value) {
				// Check if any nodes are arrays themselves
				if(is_array($array[$key]))
					// If they are, let the function call itself over that particular node
					$array[$key] = $this->filterParameters($array[$key]);
				
				// Check if the nodes are strings
				if(is_string($array[$key]))
					// If they are, perform the real escape function over the selected node
					$array[$key] = mysql_real_escape_string($array[$key]);
			}           
		}
		// Check if the parameter is a string
		if(is_string($array))
			// If it is, perform a  mysql_real_escape_string on the parameter
			$array = mysql_real_escape_string($array);
	   
		// Return the filtered result
		return $array;
	}
	
	// *****************************************************************************
	// Description: This function displays a table with customizable options such as 
	//				view, edit and delete an individual record as well as multiple 
	//				record selection to perform bulk operations. The return value is 
	//				an array with information such as total records, total pages, 
	//				page number and navigational links for: first page, last page, 
	//				previous page and next page.
	//
	//				The table is wrapped in a form named [tfs_pagination] with a post 
	//				method  which submits to the current url. Each row has a checkbox
	//				named with the primary key and prefixed with [chk_].
	//
	//				This function checks for two GET variables: 
	//					$p - will set the table to that specific page
	//					$r - will set the number of records per page
	//
	//				Every second row has a css class of [alternate]
	//
	// Arguments:	$where - a string that is apended to the mysql query to 
	//					fine-tune the select criteria.
	// 				$options - a multidimentional array
	//					[anchor]=> The html displayed in the options column
	//					[link]=> The link for the anchor
	//					[get]=> The Get variable appended to the link	
	//				$echo - Whether it should echo or return					
	// 
	// Returns:		$html - an associative array
	//					[totalrecords]=> The total number of records from the query
	//					[totalpages]=> The total number of pages from the query
	//					[currentpage]=> The current page in the query
	//					[prevlink]=> The url to the previous page if not on the first page
	//					[nextlink]=> The url to the next page if not on the last page
	//					[firstlink]=> The url to the first page if not on the first page
	//					[lastlink]=> The url to the last page if not on the last page
	//					[table]=> If echo is false returns the html here
	// *****************************************************************************

	function tfs_pagination($where="") {
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
			<li><a href="javascript:tfs_actionDelete();" class="delete-bulk">Delete Selected</a></li>';
		
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
			if($where != NULL) $ql .= " $where";
			$ql .= " LIMIT " . $l . ",$r";
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
	
	public function tfs_result($where="") {
		$result = array();
		$pk = $this->field_list['pk'];
		
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
		
		$col = $pk . ", ";
		foreach($this->field_list as $key=>$value){
			if(is_array($value))
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		
		$qc = "SELECT COUNT($pk) AS total FROM $this->table_name " . $where;
		$mysql = mysql_query($qc) or die($qc);
		$tr = mysql_result($mysql,0);
		$tp = ceil($tr / $r); 
		
		if($tp > 0){
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
			
			$ql = "SELECT $col FROM $this->table_name ";
			if($where != NULL) $ql .= " $where";
			$ql .= " LIMIT " . $l . ",$r";
			$mysql = mysql_query($ql) or die(mysql_error());
			
			$rc = 0;
			$rowc = 0;
			while($rows = mysql_fetch_array($mysql)){
				$colc = 0;
				foreach($this->field_list as $key=>$value){
					if(is_array($value)) {
						if(isset($this->field_list[$key]['reference'])){
							if(empty($this->field_list[$key]['reference']['static'])){
								$result[$rowc][$this->field_list[$key]['field']] = $this->tfs_getReference($rows[$this->field_list[$key]['field']], $this->field_list[$key]['reference']) ; 
								
							}else{
								$result[$rowc][$this->field_list[$key]['field']] = $this->field_list[$key]['bf'] . $rows[$this->field_list[$key]['field']] . $this->field_list[$key]['af'] ;
							}
						} else if(isset($this->field_list[$key]['bool'])){
							if($rows[$this->field_list[$key]['field']] == $this->field_list[$key]['checkvalue']['checked']){
								$result[$rowc][$this->field_list[$key]['field']] =  $this->field_list[$key]['bool']['true'] ;
							}else{
								$result[$rowc][$this->field_list[$key]['field']] =  $this->field_list[$key]['bool']['false'] ;
							}
						} else {
							if(isset($this->field_list[$key]['link'])){
								$result[$rowc][$this->field_list[$key]['field']] = $this->field_list[$key]['bf'] . "<a onclick=\"".$this->field_list[$key]['link']['onclick']."('".$this->field_list[$key]['link']['innerHtml']."', ". $rows[$pk] .")\" >" . $rows[$this->field_list[$key]['field']] ."</a>". $this->field_list[$key]['af'];
							}else{
								$result[$rowc][$this->field_list[$key]['field']] =  $this->field_list[$key]['bf'] . $this->tfs_excerpt($rows[$this->field_list[$key]['field']], $this->excerpt, $this->pad) . $this->field_list[$key]['af'];
							}
						}
						$result[$rowc][($this->field_list[$key]['field']."_raw")] = $rows[$this->field_list[$key]['field']];
					} else if ($key == 'pk'){
						$result[$rowc][$this->field_list[$key]] = $rows[$this->field_list[$key]];
						$result[$rowc][($this->field_list[$key]."_raw")] = $rows[$this->field_list[$key]];
					}
					$colc += 1; 	
				}
				$rowc += 1; 
			}
			
		}
		return $result;
	}
	
	// *****************************************************************************
	// Description:	This is a helper funtion to output the return data from 
	//				tfs_pagination(). It displays a navigation widget for  
	//				tfs_pagination(). The widget has a form where users can set the
	//				page number and records per page.
	//
	// Arguments: 	$pagination - please see the tfs_pagination().
	//
	// Returns: 	$html - simple html that can be placed anywhere on the page
	// *****************************************************************************
	function tfs_navArray($where=""){
		
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
		
		$pk = $this->field_list['pk'];
		$qc = "SELECT COUNT($pk) AS total FROM $this->table_name "  . $where;
		$tr = mysql_result(mysql_query($qc),0);
		$tp = ceil($tr / $r); 
		
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
		$meta = array();
		$meta['totalrecords'] = $tr;
		$meta['totalpages'] = $tp;
		$meta['currentpage'] = $p;
		
		if($tp > 1){
		
			// Build the navigation links
			$url = $this->tfs_currentURL();
			$base = explode("?", $url);
			$prev = $p - 1;
			$next = $p + 1;
			
			$meta['prevlink'] = ($p > 1 ? $prevlink = $base[0] . '?p=' . $prev . '&r=' . $r : $prevlink = '');
			$meta['nextlink'] = ($p < $tp ? $nextlink = $base[0] . '?p=' . $next . '&r=' . $r : $nextlink = '');
			$meta['firstlink'] = ($p != 1 ? $firstlink = $base[0] . '?p=1' . '&r=' . $r : $firstlink = '');
			$meta['lastlink'] = ($p != $tp ? $lastlink = $base[0] . '?p=' . $tp . '&r=' . $r : $lastlink = '');
			
		}
		return $meta;
	}
	
	function tfs_mysqlNavigation($where){
		
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
	
	
	function tfs_mysqlWidget(){
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
	
		$html =  "<ul>";
		$html .= '<li><a href="javascript:tfs_actionDelete();" class="delete-bulk">Delete</a></li>';
		$html .= '<li><a href="javascript:tfs_actionUpdate();" class="update-bulk">Update</a></li>';
		$html .= '<li><a href="?n=new&p='.$p.'&r='.$r.'" >New</a></li>';
		$html .= '<li><a href="javascript:insertBulk();" >Insert Multiple</a></li>';
		$html .= "</ul>";
		echo $html;
	}
	// *****************************************************************************
	// Description:	This function deletes a record and returns a value from a
	//				specified field.
	//
	// Arguments: 	$where - a string that is apended to the mysql query to 
	//					fine-tune the select criteria.
	//				$echo - (optioinal) a string of a field name in the table.
	//
	// Returns: 	$v - a string with the value of a field set by $echo
	// *****************************************************************************
	
	function tfs_delete($where, $echo=NULL) {
		$v = '';
		if($this->message != NULL && $this->message != ''){
			$q  = "SELECT $echo FROM {$this->table_name} WHERE $where";
			$mysql = mysql_query($q) or die(mysql_error());
			while($rows = mysql_fetch_array($mysql)){
				$v = $rows[$this->message];
			}
		}
		$d = "DELETE FROM {$this->table_name} WHERE $where";
		mysql_query($d) or die(mysql_error());
		if($this->message != NULL && $this->message != ''){
			return $v;
		} else {
			return;
		}
	}
	
	// *****************************************************************************
	// Description:	This function deletes multiple records selected in the 
	//				tfs_pagination form.
	//
	// Arguments: 	$post - these are the checkboxes selected in the tfs_pagination
	//				form.
	//				$echo - (optioinal) the field name value to be displayed in the
	//				message returned.
	//
	// Returns: 	$v - a html message with all records that were 
	//				deleted
	// *****************************************************************************
	
	private function tfs_deleteBulk($post, $echo=NULL) {
		$msg = "";
		foreach ($post as $key=>$value){
			if($key != "chk_all" && $key != "action"){
				$where = $this->field_list['pk'] . "='" . $post[$key] . "'";
				$m = $this->tfs_delete($where, $this->message);
				$msg .= $m . ' has been deleted.<br />';
			}
		}
		if($this->message != NULL && $this->message != ''){
			return $msg;
		} else {
			return;
		}
	}
	
	// *****************************************************************************
	// Description:	This function performs a single record update action
	//
	// Arguments: 	none
	//
	// Returns: 	$v - a string of the table field value of the record updated
	// *****************************************************************************
	
	private function tfs_update(){
		$post = $this->filterParameters($_POST);
		$pk = $this->field_list['pk'];
		$q  = "UPDATE {$this->table_name} ";
		$set = "SET ";
		$v = "";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE)
				if(isset($post[$this->field_list[$key]['field']])){
					$set .= $this->field_list[$key]['field'] . "='" . $post[$this->field_list[$key]['field']] . "', ";
					if($this->message == $this->field_list[$key]['field']){
						$v = $_POST[$this->field_list[$key]['field']];
					}
				}
		}
		$set = rtrim($set, ', ');
		$q  .= $set;
		$w  = " WHERE $pk = '$_POST[$pk]'";
		$q .= $w;
		mysql_query($q) or die(mysql_error()); 
		if($this->message != NULL && $this->message != ''){
			return $v;
		} else {
			return;
		}
	}
	
	// *****************************************************************************
	// Description:	This function performs a single record insert action
	//
	// Arguments: 	none
	//
	// Returns: 	$mysql_id - the record id that was generated by mysql on the 
	//				insert action
	// *****************************************************************************
	
	private function tfs_insert(){
		$post = $this->filterParameters($_POST);
		$query  = "INSERT INTO $this->table_name ";
		$col = "(";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE && isset($_POST[$this->field_list[$key]['field']]))
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['where']) && $this->field_list[$key]['where'] == 'session' && isset($_SESSION['tfs_userid']))
			$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		$query  .= $col . ") VALUES ";
		$values = "(";
		foreach($_POST as $key=>$value){
			if($key != 'Submit')
			$values .= "'$value', ";
		}
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['where']) && $this->field_list[$key]['where'] == 'session'  && isset($_SESSION['tfs_userid']))
			$values .= $_SESSION['tfs_userid'] . ", ";
		}
		$values = rtrim($values, ', ');
		$values .= ")";
		$query  .= $values;
		mysql_query($query) or die(mysql_error());
		$mysql_id = mysql_insert_id(); 
		return $mysql_id;
	}
	
	// *****************************************************************************
	// Description:	This function performs a multiple record update action
	//
	// Arguments: 	none
	//
	// Returns: 	$msg - a html message with all records that were 
	//				updated
	// *****************************************************************************
	
	private function tfs_updateBulk(){
		$post = $this->filterParameters($_POST);
		$pk = $this->field_list['pk'];
		$count = $_POST['count'];
		$count += 1; 
		$msg = "";
		for($i=0;$i<$count;$i++){
			$q  = "UPDATE {$this->table_name} ";
			$set = "SET ";
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE)
					if(isset($post[$this->field_list[$key]['field']."__".$i])){
						$set .= $this->field_list[$key]['field'] . "='" . $post[$this->field_list[$key]['field']."__".$i] . "', ";
						if($this->message == $this->field_list[$key]['field']){
							$m = $_POST[$this->field_list[$key]['field']."__".$i];
							$msg .= $m . ' has been updated.<br />';
						}
					}
					
			}
			$set = rtrim($set, ', ');
			$q  .= $set;
			$w  = " WHERE $pk = " . $post[($pk."__".$i)];
			$q .= $w;
			mysql_query($q) or die(mysql_error()); 
		}
		if($this->message != NULL && $this->message != ''){
			return $msg;
		} else {
			return;
		}
	}
	
	// *****************************************************************************
	// Description:	This function performs a multiple record insert action
	//
	// Arguments: 	none
	//
	// Returns: 	$mysql_id - not yet active but should be and array of ids generated
	//				by mysql on the insert action
	// *****************************************************************************
	
	private function tfs_insertBulk(){
		$post = $this->filterParameters($_POST);
		$count = (int)($_GET['i']);
		$mysql_id = array();
		
		for($i=0;$i<$count;$i++){
			$query  = "INSERT INTO $this->table_name ";
			$col = "(";
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE && isset($post[$this->field_list[$key]['field'].'__'.$i]))
					$col .= $this->field_list[$key]['field'] . ", ";
			}
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['where']) && $this->field_list[$key]['where'] == 'session' && isset($_SESSION['tfs_userid']))
				$col .= $this->field_list[$key]['field'] . ", ";
			}
			$col = rtrim($col, ', ');
			$query  .= $col . ") VALUES ";
			$values = "(";
			foreach($post as $key=>$value){
				if($key != 'Submit' && $key != 'Submit' && !preg_match("/chk_/i", $key) && preg_match("/__".$i."/i", $key))
				$values .= "'".$post[$key]."', ";
			}
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['where']) && $this->field_list[$key]['where'] == 'session'  && isset($_SESSION['tfs_userid']))
				$values .= $_SESSION['tfs_userid'] . ", ";
			}
			$values = rtrim($values, ', ');
			$values .= ")";
			$query  .= $values;
			mysql_query($query) or die($query);
			$id = mysql_insert_id(); 
			array_push($mysql_id, $id);
		}
		return $mysql_id;
	}
	
	// *****************************************************************************
	// Description:	This function generates the html table for multiple records to be
	//				updated.
	//
	// Arguments: 	$pkv - an array of primary keys selected from the tfs_pagination()
	//				form.
	//
	// Returns: 	$update - a string of html that can be placed anywhere on the
	//				page.
	// *****************************************************************************
	
	private function tfs_frmUpdateBulk($pkv){
		$p = (isset($_GET['p']) ? '&p='.$_GET['p'] : '');
		$r = (isset($_GET['r']) ? '&r='.$_GET['r'] : '');
		$html = "\n<form id=\"tfs_updatebulk\" name=\"tfs_pagination\" method=\"post\" action=\"?a=updatebulk$p$r\" > \n";
		
		if($this->bulk_layout == 'vertical'){
			$html .= "";
		}else{
			$html .= "\t<table><thead> \n";
			$html .= "\t\t<tr> \n";
			foreach($this->field_list as $key=>$value) {
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE) 
				$html .= "\t\t\t<th>$value[bt]$key$value[at]</th> \n";
			}
			$html .= "\t\t</tr></thead> \n";
		}
		
		
		$pkey = $this->field_list['pk'];
		$col = $this->field_list['pk'] . ", ";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE)
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		$where = $this->field_list['pk'] . ' IN(';
		$kv = "";
		foreach($pkv as $key=>$value){
			if($value != 'update' && $value != 'all')
			$kv .= $value . ", ";
		}
		$kv = rtrim($kv, ', ');
		$where .= $kv . ')';
		$q =  "SELECT $col FROM {$this->table_name} WHERE $where";
		$r = mysql_query($q) or die(mysql_error());
		$count=mysql_num_rows($r);
		$i = 0;
		while($rows=mysql_fetch_array($r)){
			
			if($this->bulk_layout == 'vertical'){
				$html .= "\t<div class=\"multiple\"><table> \n";
				$html .= "<thead> \n";
				$html .= "\t\t<tr> \n";
				$html .= "\t\t\t<th colspan=3><h3>Update</h3></th> \n";	
				$html .= "\t\t</tr></thead> \n";
				$html .= "\t\t<tbody><input type=\"hidden\" name=\"$pkey" . "__" . $i . "\" id=\"$pkey" . "__" . $i . "\" value=\"$rows[$pkey]\"/> \n";
				
			}else{
				$html .= "\t\t</tbody><tr><input type=\"hidden\" name=\"$pkey" . "__" . $i . "\" id=\"$pkey" . "__" . $i . "\" value=\"$rows[$pkey]\"/> \n";
				
			}
			
			foreach($this->field_list as $key=>$value){
					if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE){
					$formclass = (isset($this->field_list[$key]['formclass']) ? $this->field_list[$key]['formclass'] : NULL );
					
					if($this->bulk_layout == 'vertical'){
						$html .= "\t\t<tr> \n";
						$html .= "\t\t\t<th align=\"right\">$value[bt]$key$value[at]</th> \n";
						$html .= "\t\t\t<td> \n";
					}else{
						$html .= "\t\t\t<td> \n";
					}
					$parent = array();
					if(isset($this->field_list[$key]['parent'])) $parent = array($this->field_list[$key]['parent'], $rows[$this->field_list[$key]['parent']]);
					switch ($this->field_list[$key]['form']) {
						case 'textarea':
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextArea($this->field_list[$key]['field'].'__'.$i, $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							break;
						case 'checkbox':
							$checked = (isset($this->field_list[$key]['checkvalue']['checked']) ? $this->field_list[$key]['checkvalue']['checked'] : TRUE);
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmCheckbox($this->field_list[$key]['field'].'__'.$i, $rows[$this->field_list[$key]['field']], $checked, $formclass, $this->field_list[$key]['checkvalue']) . $this->field_list[$key]['af'];
							break;
						case 'select':
							if(empty($this->field_list[$key]['reference']['static'])){
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelectReference($this->field_list[$key], $rows[$this->field_list[$key]['field']], $parent, '__'.$i) . $this->field_list[$key]['af'];
							}else{
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelect($this->field_list[$key]['field'].'__'.$i, $this->field_list[$key]['reference']['static'], $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							}
							break;
						default:
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextField($this->field_list[$key]['field'].'__'.$i, $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							break;
					}
					if($this->bulk_layout == 'vertical'){
						$html .= "\t\t\t</td> \n";
						$html .= "\t\t\t<td>&nbsp;</td> \n";
						$html .= "\t\t</tr> \n";
						$html .= "\t\t<tr> \n";
					}else{
						$html .= "\t\t\t</td> \n";
					}
				}
			}
			$html .= "<input type=\"hidden\" name=\"count\" id=\"count\" value=\"".$i."\"/>";
			if($this->bulk_layout == 'vertical'){
				$html .= "\t\t</tbody> \n";
				$html .= "\t</table></div> \n";
			} else {
				$html .= "\t\t</tr></tbody> \n";
			}
			$i += 1;
		}
		if($this->bulk_layout == 'vertical'){
			$html .= "\t\t<table> \n";
			$html .= "\t\t<tr> \n";	
			$html .= "\t\t\t<td>&nbsp;</td> \n";	
			$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Update\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
			$html .= "\t\t\t<td>&nbsp;</td> \n";
			$html .= "\t\t</tr> \n";
			$html .= "\t</table> \n";
		}else{
			$html .= "\t\t</tr> \n";
			$html .= "\t\t<tr> \n";	
			$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Update\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
			$html .= "\t\t</tr> \n";
			$html .= "\t</table> \n";
		}
		$html .= "</form> \n";
		echo $html;
	}
	
	// *****************************************************************************
	// Description:	This function generates the html table for multiple records to be
	//				inserted into mysql.
	//
	// Arguments: 	none
	//
	// Returns: 	$update - a string of html that can be placed anywhere on the
	//				page.
	// *****************************************************************************
	
	private function tfs_frmInsertBulk($nr=5){
		$pk = $this->field_list['pk'];
		$p = (isset($_GET['p']) ? '&p='.$_GET['p'] : '');
		$r = (isset($_GET['r']) ? '&r='.$_GET['r'] : '');
		if(empty($_GET['i'])){
			$n = $nr;
		}else{
			$n = $_GET['i'];
		}
		$html = "\n<form id=\"tfs_updatebulk\" name=\"tfs_pagination\" method=\"post\" action=\"?i=$n&a=insertbulk$p$r\" > \n";
		if($this->bulk_layout == 'vertical'){
			$html .= "";
		}else{
			$html .= "\t<table><thead> \n";
			$html .= "\t\t<tr> \n";
			foreach($this->field_list as $key=>$value) {
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE) 
				$html .= "\t\t\t<th>$value[bt]$key$value[at]</th> \n";
			}
			$html .= "\t\t</tr></thead> \n";
		}
		for($i=0;$i<$n;$i++){
			if($this->bulk_layout == 'vertical'){
				$html .= "\t<div class=\"multiple\"><table> \n";
				$html .= "<thead> \n";
				$html .= "\t\t<tr> \n";
				$html .= "\t\t\t<th colspan=3><h3>Insert</h3></th> \n";	
				$html .= "\t\t</tr></thead> \n";
				$html .= "\t\t<tbody> \n";
			}else{
				$html .= "\t\t<tr> \n";
			}
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE){
					$formclass = (isset($this->field_list[$key]['formclass']) ? $this->field_list[$key]['formclass'] : NULL );
					if($this->bulk_layout == 'vertical'){
						$html .= "\t\t<tr> \n";
						$html .= "\t\t\t<th align=\"right\">$value[bt]$key$value[at]</th> \n";
						$html .= "\t\t\t<td> \n";
					}else{
						$html .= "\t\t\t<td> \n";
					}
					$parent = array();
					if(isset($this->field_list[$key]['parent'])) {
						$c = "SELECT ".$this->field_list[$key]['parent']." FROM " .  $this->field_list[$key]['reference']['table'] ;
						$mysql = mysql_query($c) or die(mysql_error());
						$parent = array($this->field_list[$key]['parent'], mysql_result($mysql,0));
					}
					switch ($this->field_list[$key]['form']) {
						case 'textarea':
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextArea($this->field_list[$key]['field'].'__'.$i, NULL, $formclass) . $this->field_list[$key]['af'];
							break;
						case 'checkbox':
							$checked = (isset($this->field_list[$key]['checkvalue']['checked']) ? $this->field_list[$key]['checkvalue']['checked'] : TRUE);
							$html .= $this->field_list[$key]['bf'] .  $this->tfs_frmCheckbox($this->field_list[$key]['field'].'__'.$i, NULL, $checked, $formclass, $this->field_list[$key]['checkvalue']) . $this->field_list[$key]['af'];
							break;
						case 'select':
							if(empty($this->field_list[$key]['reference']['static'])){
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelectReference($this->field_list[$key], NULL, $parent, '__'.$i) . $this->field_list[$key]['af'];
							}else{
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelect($this->field_list[$key]['field'].'__'.$i, $this->field_list[$key]['reference']['static'], NULL, $formclass) . $this->field_list[$key]['af'];
							}
							break;
						default:
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextField($this->field_list[$key]['field'].'__'.$i, NULL, $formclass) . $this->field_list[$key]['af'];
							break;
					}
					if($this->bulk_layout == 'vertical'){
						$html .= "\t\t\t</td> \n";
						$html .= "\t\t\t<td>&nbsp;</td> \n";
						$html .= "\t\t</tr> \n";
						$html .= "\t\t<tr> \n";
					}else{
						$html .= "\t\t\t</td> \n";
					}
				}
			}
			if($this->bulk_layout == 'vertical'){
				$html .= "\t\t</tbody> \n";
				$html .= "\t</table></div> \n";
			}
		}
		if($this->bulk_layout == 'vertical'){
			$html .= "\t\t<table> \n";
			$html .= "\t\t<tr> \n";	
			$html .= "\t\t\t<td>&nbsp;</td> \n";	
			$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Insert\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
			$html .= "\t\t\t<td>&nbsp;</td> \n";
			$html .= "\t\t</tr> \n";
			$html .= "\t</table> \n";
		}else{
			$html .= "\t\t</tr> \n";
			$html .= "\t\t<tr> \n";	
			$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Insert\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
			$html .= "\t\t</tr> \n";
			$html .= "\t</table> \n";
		}
		
		$html .= "</form> \n";
		echo $html;
	}
	
	// *****************************************************************************
	// Description:	This function generates the html table for a single record to be
	//				updated.
	//
	// Arguments: 	$pk - The primary key value to be updated
	//
	// Returns: 	$update - a string of html that can be placed anywhere on the
	//				page.
	// *****************************************************************************
	
	private function tfs_frmUpdate($pk) {
		$pk = $this->field_list['pk'];
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
		
		
		$html = "\n<form id=\"tfs_update\" name=\"tfs_update\" method=\"post\" action=\"?a=update&p=$p&r=$r\"><input type=\"hidden\" name=\"$pk\" id=\"$pk\" value=\"$_GET[u]\"/> \n";
		$html .= "\t<table><thead> \n";
		$html .= "\t\t<tr> \n";
		$html .= "\t\t\t<th colspan=3><h3>Update</h3></th> \n";
		$html .= "\t\t</tr></thead> \n";
		$col = $pk . ", ";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE)
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		$q = "SELECT $col FROM $this->table_name where $pk = '$_GET[u]'";
		$mysql = mysql_query($q) or die(mysql_error());
		while($rows = mysql_fetch_array($mysql)){
			foreach($this->field_list as $key=>$value){
				if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE){
					$html .= "\t\t<tr> \n";
					$html .= "\t\t\t<th>$value[bt]$key$value[at]</th> \n";
					$formclass = (isset($this->field_list[$key]['formclass']) ? $this->field_list[$key]['formclass'] : NULL );
					$html .= "\t\t\t<td> \n";
					$parent = array();
					if(isset($this->field_list[$key]['parent'])) $parent = array($this->field_list[$key]['parent'], $rows[$this->field_list[$key]['parent']]);
					switch ($this->field_list[$key]['form']) {
						case 'textarea':
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextArea($this->field_list[$key]['field'], $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							break;
						case 'checkbox':
							$checked = (isset($this->field_list[$key]['checkvalue']['checked']) ? $this->field_list[$key]['checkvalue']['checked'] : TRUE);
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmCheckbox($this->field_list[$key]['field'], $rows[$this->field_list[$key]['field']], $checked, $formclass, $this->field_list[$key]['checkvalue']) . $this->field_list[$key]['af'];
							break;
						case 'select':
							if(empty($this->field_list[$key]['reference']['static'])){
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelectReference($this->field_list[$key], $rows[$this->field_list[$key]['field']], $parent) . $this->field_list[$key]['af'];
							}else{
								$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelect($this->field_list[$key]['field'], $this->field_list[$key]['reference']['static'], $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							}
							break;
						default:
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextField($this->field_list[$key]['field'], $rows[$this->field_list[$key]['field']], $formclass) . $this->field_list[$key]['af'];
							break;
					}
					$html .= "\t\t\t</td> \n";
					$html .= "\t\t\t<td>&nbsp;</td> \n";
					$html .= "\t\t</tr> \n";
				}
			}
		}
		$html .= "\t\t<tr> \n";
		$html .= "\t\t\t<td></td> \n";	
		$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Update\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
		$html .= "\t\t\t<td></td> \n";	
		$html .= "\t\t</tr> \n";
		$html .= "\t</table> \n";
		$html .= "</form> \n";
		echo $html;
		
	}
	
	// *****************************************************************************
	// Description:	This function generates the html table for a single record to be
	//				inserted into mysql.
	//
	// Arguments: 	none
	//
	// Returns: 	$update - a string of html that can be placed anywhere on the
	//				page.
	// *****************************************************************************
	
	private function tfs_frmInsert(){
		$pk = $this->field_list['pk'];
		$get = $this->tfs_getURL();
		$r = (isset($get['pagination']['r']) ? $get['pagination']['r'] : $this->per_page);
		$p = (isset($get['pagination']['p']) ? $get['pagination']['p'] : 1);
		$g = (isset($get['get']) ? implode("&", $get['get']) : '');
		
		$html = "\n<form id=\"tfs_update\" name=\"tfs_update\" method=\"post\" action=\"?a=insert&p=$p&r=$r\"> \n";
		$html .= "\t<table><thead> \n";
		$html .= "\t\t<tr> \n";
		$html .= "\t\t\t<th colspan=3><h3>Insert</h3></th> \n";
		$html .= "\t\t</tr></thead> \n";
		$html .= "\t\t<tbody> \n";
		$col = $pk . ", ";
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE)
				$col .= $this->field_list[$key]['field'] . ", ";
		}
		$col = rtrim($col, ', ');
		foreach($this->field_list as $key=>$value){
			if(is_array($value) && isset($this->field_list[$key]['update']) && $this->field_list[$key]['update'] == TRUE){
				$html .= "\t\t<tr> \n";
				$html .= "\t\t\t<th align=\"right\">$value[bt]$key$value[at]</th> \n";
				$formclass = (isset($this->field_list[$key]['formclass']) ? $this->field_list[$key]['formclass'] : NULL );
				$html .= "\t\t\t<td> \n";
				$parent = array();
				if(isset($this->field_list[$key]['parent'])) {
					$c = "SELECT ".$this->field_list[$key]['parent']." FROM " .  $this->field_list[$key]['reference']['table'] ;
					$mysql = mysql_query($c) or die(mysql_error());
					$numrows = mysql_num_rows($mysql);
					if(!isset($_GET['n']) && $_GET['n'] != 'new'){
						if($numrows > 0)
						$parent = array($this->field_list[$key]['parent'], mysql_result($mysql,0));
					}
				}
				
				switch ($this->field_list[$key]['form']) {
					case 'textarea':
						$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextArea($this->field_list[$key]['field'], NULL, $class=$formclass) . $this->field_list[$key]['af'];
						break;
					case 'checkbox':
						$checked = (isset($this->field_list[$key]['checkvalue']['checked']) ? $this->field_list[$key]['checkvalue']['checked'] : TRUE);
						$html .= $this->field_list[$key]['bf'] . $this->tfs_frmCheckbox($this->field_list[$key]['field'], NULL, $checked, $formclass, $this->field_list[$key]['checkvalue']) . $this->field_list[$key]['af'];
						break;
					case 'select':
						if(empty($this->field_list[$key]['reference']['static'])){
							$html .= $this->field_list[$key]['bf'] . $this->tfs_frmSelectReference($this->field_list[$key], NULL, $parent) . $this->field_list[$key]['af'];
						}else{
							$html .= $this->field_list[$key]['bf'] .$this->tfs_frmSelect($this->field_list[$key]['field'], $this->field_list[$key]['reference']['static'], $class=$formclass) . $this->field_list[$key]['af'];
						}
						break;
					default:
						$html .= $this->field_list[$key]['bf'] . $this->tfs_frmTextField($this->field_list[$key]['field'], NULL, $formclass) . $this->field_list[$key]['af'];
						break;
				}
				$html .= "\t\t\t</td> \n";
				$html .= "\t\t\t<td>&nbsp;</td> \n";
				$html .= "\t\t</tr> \n";
			}
		}
		$html .= "\t\t<tr> \n";
		$html .= "\t\t\t<td></td> \n";	
		$html .= "\t\t\t<td><input type=\"submit\" name=\"Submit\" value=\"Insert\" class=\"insert\"/><input type=\"reset\" name=\"Reset\" value=\"Reset\" class=\"reset\" /></td> \n";	
		$html .= "\t\t\t<td></td> \n";	
		$html .= "\t\t</tr> \n";
		$html .= "\t\t</tbody> \n";
		$html .= "\t</table> \n";
		$html .= "</form> \n";
		echo $html;
		
	}
	
	
	
	
	// *****************************************************************************
	// Description:	The following functions generates the html for various form
	//					elements - textfield, textarea, select and checkbox.
	//
	// Arguments: 	$field - The name and id of the element.
	//				$value - The value that the element should be initialized with.
	//				$class - The css class that the field will be asigned.
	//				$checked - The value of the checkbox when checked.
	//				$reference - An array of the table to refer to or an array
	//						that will be used for static values, this is set by 
	//						using static in the class definitions.
	//					[table]=> The table to get the values from
	//					[display]=> The field in the reference table to display
	//					[value]=> The primary key used in the where clause
	//
	// Returns: 	$h - a string of html for the element.
	// *****************************************************************************
	
	private function tfs_frmTextField($field, $value=NULL, $class=NULL) {
		$h = "\t\t\t\t<input type=\"text\" name=\"$field\" id=\"$field\" class=\"$class\" value=\"$value\" > \n";
		return $h;
	}
	
	public function tfs_frmSuggestField($field, $value=NULL, $class=NULL) {
		$h = "\t\t\t\t<span><input type=\"text\" name=\"$field\" id=\"$field\" alt=\"Search Criteria\"   onkeyup=\"searchSuggest('".$this->cls."','".$this->construct."');\" autocomplete=\"off\" class=\"$class\" /></span><div id=\"search_suggest\"></div> \n";
		return $h;
	}
	private function tfs_frmTextArea($field, $value=NULL, $class=NULL) {
		$h = "\t\t\t\t<textarea name=\"$field\" id=\"$field\" class=\"$class\" >$value</textarea> \n";
		return $h;
	}
	
	private function tfs_frmCheckbox($field, $value=NULL, $checked=NULL, $class=NULL, $checkedvalue) {
		$h = ($value == $checked 
		? "\t\t\t\t<input type=\"checkbox\" name=\"chk_$field\" id=\"chk_$field\" value=\"$checked\" class=\"$class\" checked onchange=\"checkboxvalue(this,'$field','$checkedvalue[checked]','$checkedvalue[unchecked]')\" > \n" 
		: "\t\t\t\t<input type=\"checkbox\" name=\"chk_$field\" id=\"chk_$field\" value=\"$checked\" class=\"$class\" onchange=\"checkboxvalue(this,'$field','$checkedvalue[checked]','$checkedvalue[unchecked]')\" > \n");
		$h .= "<input name=\"$field\" id=\"$field\" type=\"hidden\" value=\"$value\" />";
		return $h;
	}
	
	private function tfs_frmSelect($field, $reference, $value=NULL, $class=NULL) {
		
		$h = "\t\t\t\t<select name=\"$field\" id=\"$field\" class=\"$class\" > \n" ;
		if($value != NULL){
			foreach($reference as $key=>$val){
				$h .= ($value == $val ? "\t\t\t\t\t<option value=\"$val\" selected >$key</option> \n" 
				: "\t\t\t\t\t<option value=\"$val\">$key</option> \n");
			}
		}else{
			foreach($reference as $key=>$val){
				$h .= "\t\t\t\t\t<option value=\"$val\">$key</option> \n";
			}
		}
      	$h .= "\t\t\t\t</select> \n";
		return $h;
	}
	
	public function tfs_childReference($field) {
		foreach($this->field_list as $key=>$value){
			if(isset($this->field_list[$key]['parent']) && $this->field_list[$key]['parent'] == $field){
				return $this->field_list[$key]['reference'];
			}
		}
	}
	public function tfs_getFirstParentValue($child){
	
		$parent = array();
		foreach($this->field_list as $key=>$value){
			if(isset($this->field_list[$key]['child']) && $this->field_list[$key]['child'] == $child){
				$q = "SELECT ". $this->field_list[$key]['reference']['value'] ." FROM " .  $this->field_list[$key]['reference']['table'];
				$mysql = mysql_query($q) or die(mysql_error());
				$numrows = mysql_num_rows($mysql);
				if($numrows > 0){
					$parent[0] = $this->field_list[$key]['reference']['value'];
					$parent[1] = mysql_result($mysql,0);
					
				}else{
					$parent[0] =NULL;
					$parent[1] = -1;
					
				}
				return $parent;
			}
		}
	}
	
	public function tfs_frmSelectReference($fieldattrs, $value, $parent, $append="", $all="", $call=FALSE){
		
		$sel = FALSE;
		$url = $this->tfs_currentURL();
		$base = explode("?", $url);
		$get = "";
		if(isset($base[1])){
		$get = $base[1];
		
		}
		$get .= "&construct=".$this->construct."&cls=".$this->cls;
		if(isset($_POST['action']))
		$get = "u=update";
		$child = $this->tfs_childReference($fieldattrs['field']);
		$js = "";
		if(isset($fieldattrs['child']))
		$js = "onchange=\"loadSubCat(this.value,'".$fieldattrs['field'].$append."','".$fieldattrs['child'].$append."', '".$get."');\"";
		$id = "";
		if(isset($fieldattrs['parent']))
		$id = "id=\"ajax$fieldattrs[field]$append\"";
		if($call==FALSE){
		$span = "<span ".$id.">";
		$spn = "</span>";
		}else{
		$span = "";
		$spn = "";
		}
		if($all==""){
			$h = "\t\t\t\t".$span."<select name=\"$fieldattrs[field]$append\" id=\"$fieldattrs[field]$append\" class=\"$fieldattrs[formclass]\" $js> \n";
		}else{
			if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk')){
				$h = "\t\t\t\t".$span."<select name=\"$fieldattrs[field]$append\" id=\"$fieldattrs[field]$append\" class=\"$fieldattrs[formclass]\" $js> \n";
			}else{
				$h = "\t\t\t\t".$span."<select name=\"$fieldattrs[field]$append\" id=\"$fieldattrs[field]$append\" class=\"slt_default\" $js> \n";
			}
		}
		if(isset($parent[0]) && isset($parent[1])){
			if($parent[1] !="" && $parent[1] !="all"){
				$q = "SELECT ".$fieldattrs['reference']['value'].", ".$fieldattrs['reference']['display']." FROM ".$fieldattrs['reference']['table']." WHERE " . $parent[0] . " = " . $parent[1];
			}else{
				$q = "SELECT ".$fieldattrs['reference']['value'].", ".$fieldattrs['reference']['display']." FROM ".$fieldattrs['reference']['table']." WHERE " . $parent[0] . " = -1";
			}
		}else{
			$q = "SELECT ".$fieldattrs['reference']['value'].", ".$fieldattrs['reference']['display']." FROM ".$fieldattrs['reference']['table'];
		}
		$mysql = mysql_query($q) or die($q);
		if(mysql_num_rows($mysql) > 0){
			if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk')){
				$h .= "\t\t\t\t\t<option value=\"\" selected >Select... </option> \n";
				$sel = TRUE;
			}
			if(isset($_GET['u']))
			$sel = TRUE;
			if($all!=""){
				if($value == "all"){
					if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk') || isset($_GET['u'])){
						if($sel == FALSE)
						$h .= "\t\t\t\t\t<option value=\"\" selected >Select... </option> \n";
					}else{
						if($sel == FALSE)
						$h .= "\t\t\t\t\t<option value=\"all\" selected >".$all."</option> \n";
					}
				} else {
					if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk') || isset($_GET['u'])){
						if($sel == FALSE)
						$h .= "\t\t\t\t\t<option value=\"\" selected >Select... </option> \n";
					}else{
						if($sel == FALSE)
						$h .= "\t\t\t\t\t<option value=\"all\" >".$all."</option> \n";
					}
				}
			}
			while($rows = mysql_fetch_array($mysql)){
				if(isset($fieldattrs['child'])){
					if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk') || isset($_GET['u']) || isset($_POST['action'])){
						$h .= ($value == $rows[$fieldattrs['reference']['value']] ? "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" selected >" . $rows[$fieldattrs['reference']['display']] . "</option> \n"
						: "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" >" . $rows[$fieldattrs['reference']['display']] . "</option> \n");
					}else if($this->tfs_ParentHasChildren($rows[$fieldattrs['reference']['value']], $fieldattrs['reference']['value'])){
						if($this->tfs_WhereHasPk($rows[$fieldattrs['reference']['value']], $fieldattrs['reference']['value'])){
							$h .= ($value == $rows[$fieldattrs['reference']['value']] ? "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" selected >" . $rows[$fieldattrs['reference']['display']] . "</option> \n"
							: "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" >" . $rows[$fieldattrs['reference']['display']] . "</option> \n");
						}
					}
				}else{
					if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk') || isset($_GET['u']) || isset($_POST['action'])){
						$h .= ($value == $rows[$fieldattrs['reference']['value']] ? "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" selected >" . $rows[$fieldattrs['reference']['display']] . "</option> \n"
						: "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" >" . $rows[$fieldattrs['reference']['display']] . "</option> \n");
					}else if($this->tfs_WhereHasPk($rows[$fieldattrs['reference']['value']], $fieldattrs['reference']['value'])){
						$h .= ($value == $rows[$fieldattrs['reference']['value']] ? "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" selected >" . $rows[$fieldattrs['reference']['display']] . "</option> \n"
						: "\t\t\t\t\t<option value=\"" . $rows[$fieldattrs['reference']['value']] . "\" >" . $rows[$fieldattrs['reference']['display']] . "</option> \n");
					}
				}
			}
		}else{
			if((isset($_GET['n']) && $_GET['n']=='new') || (isset($_GET['n']) && $_GET['n']=='newbulk') || isset($_GET['u'])){
				if($sel == FALSE)
				$h .= "\t\t\t\t\t<option value=\"\" selected >Select... </option> \n";
			}else{
				if($sel == FALSE)
				$h .= "\t\t\t\t\t<option value=\"all\" selected >".$all."</option> \n";
			}
		}
		$h .= "\t\t\t\t</select>".$spn." \n";
		
		return $h;
	}
	
	public function tfs_ParentHasChildren($pkv, $field){
		$hasChildren = FALSE;
		foreach($this->field_list as $key=>$value){
			if(isset($this->field_list[$key]['parent']) && $this->field_list[$key]['parent'] == $field){
				$q = "SELECT ". $this->field_list[$key]['reference']['value'] ." FROM " .  $this->field_list[$key]['reference']['table'] . " WHERE ". $field . " = " . $pkv;
				$mysql = mysql_query($q) or die($q);
				$numrows = mysql_num_rows($mysql);
				if($numrows > 0){
					return TRUE;
				}
			}
		}
	}
	
	public function tfs_WhereHasPk($pkv, $field){
		$hasPk = FALSE;
		$q = "SELECT ". $this->field_list['pk'] ." FROM " .  $this->table_name . " WHERE ". $field . " = " . $pkv;
		$mysql = mysql_query($q) or die($q);
		$numrows = mysql_num_rows($mysql);
		if($numrows > 0){
			return TRUE;
		}
	}
	public function tfs_Upload(){
		echo '<div id="mainbody" >
		<h3>File Upload</h3>
		<!-- Upload Button, use any id you wish-->
		<div id="upload" ><span>Select File<span></div><span id="status" ></span>
		<ul id="files" ></ul>
		</div>';
	
	}
	
	public function tfs_UploadIns(){
	
		echo '<div id="mainbody" >
		<h3>File Upload</h3>
		<!-- Upload Button, use any id you wish-->
		<div id="insimg" ><span>Select File<span></div><span id="status" ></span>
		<ul id="files" ></ul>
		</div>';
	
	}
	// *****************************************************************************
	// Description:	This is the main function for handling all get and post methods.
	//					The function will direct the application to the relevant
	//					methods based on user interaction.
	//
	// Arguments: 	none
	//
	// Returns: 	$content - An array will holds all page data to be printed by
	//					the browser.
	// *****************************************************************************
	
	function tfs_mysql(){
		$mywhere = $this->tfs_sessionMatch();
		if(isset($_GET['d'])){
			$where = $this->field_list['pk'] . "='" . $_GET['d'] . "'";
			$msg = $this->tfs_delete($where, $this->message);
			if($msg != "") $this->notify = $msg . " has been deleted.";
			$this->active = FALSE;
		} else if(isset($_GET['u'])){
			$u = $_GET['u'];
			$this->tfs_frmUpdate($u);
			$this->active = TRUE;
		} else if(isset($_GET['view'])){
			$function = $this->view;
			$this->$function();
			$this->active = TRUE;
		} else if (isset($_GET['n'])){
			if($_GET['n'] == 'new'){
				$this->tfs_frmInsert();
				$this->active = TRUE;
			}else if($_GET['n'] == 'newbulk'){
				$this->tfs_frmInsertBulk();
				$this->active = TRUE;
			}
		} else if (isset($_GET['a'])){
			if($_GET['a'] == 'update'){
				$msg = $this->tfs_update();
				if($msg != "") $this->notify = $msg . " has been updated.";
				$this->active = FALSE;
			}else if ($_GET['a'] == 'updatebulk'){
				$msg = $this->tfs_updatebulk();
				if($msg != "") $this->notify = $msg;
				$this->active = FALSE;
			}else if ($_GET['a'] == 'insert'){
				$pkv = $this->tfs_insert();
				$msg = $this->tfs_getFieldValue($pkv, $this->message);
				if($msg != "") $this->notify = $msg . " has been inserted.";
				$this->active = FALSE;
			}else if ($_GET['a'] == 'insertbulk'){
				$pks = $this->tfs_insertBulk();
				$msg = "";
				foreach($pks as $key=>$value){
					$m = $this->tfs_getFieldValue($value, $this->message);
					$msg .= $m . ' has been inserted.<br />';
				}
				if($msg != "") $this->notify = $msg;
				$this->active = FALSE;
			}
		} else if (isset($_GET['upload'])){
				$this->tfs_Upload();
				$this->active = TRUE;
		} else if (isset($_GET['insimg'])){
				
				$this->tfs_UploadIns();
				$this->active = TRUE;
		} else {
			if(isset($_POST['action']) && $_POST['action'] == "delete"){
				$msg = $this->tfs_deleteBulk($_POST, $this->message);
				if($msg != "") $this->notify = $msg;
				$this->active = FALSE;
				
			} else if (isset($_POST['action']) && $_POST['action'] == "update"){
				$this->tfs_frmUpdateBulk($_POST);
				$this->active = TRUE;
			}
		}
	}
	
	function tfs_module($module=NULL, $i=5){
		if(!$this->active){
		$mywhere = $this->tfs_sessionMatch();
			if($module != NULL){
				if($module == "insert"){
					$this->tfs_frmInsert();
				} else if ($module == "insertBulk"){
					$this->tfs_frmInsertBulk($i);
				} else if ($module == "pagination"){
					$this->tfs_pagination($mywhere);
				} else if ($module == "navigation"){
					$this->tfs_mysqlNavigation($mywhere);
				} else if ($module == "where"){
					$this->tfs_where();
				} else if ($module == "widget"){
					$this->tfs_mysqlWidget();
				}
			}else{
				$this->tfs_pagination($mywhere, FALSE);
				$this->tfs_mysqlNavigation($mywhere);
				$this->tfs_mysqlWidget();
			}
		}
		if($this->notify != NULL){
			echo "<script type=\"text/javascript\">$.prompt('".$this->notify."',{ opacity: 0.5 });</script>";
			$this->notify = NULL;
		}
	}
}
?>