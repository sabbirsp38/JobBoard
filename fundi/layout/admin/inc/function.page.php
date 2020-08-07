<?php

function winner(){
	$object = new cls_winner();
	$object->tfs_mysql();
	$object->tfs_module('where');
	$object->tfs_module('pagination');
	$object->tfs_module('navigation');
}

function store(){
	$object = new cls_store();
	$object->tfs_mysql();
	$object->tfs_module('where');
	$object->tfs_module('pagination');
	$object->tfs_module('navigation');
}

function prize(){
	$object = new cls_prize();
	$object->tfs_mysql();
	$object->tfs_module('where');
	$object->tfs_module('pagination');
	$object->tfs_module('navigation');
}


function redirect(){
	header('Location: index.php');
}
function login(){
	echo '<form id="login" name="login" method="post" action="">
			<table>
				<thead> 
					<tr> 
						<th>&nbsp;</th> 
						<th><h3>Login</h3></th> 
						<th>&nbsp;</th> 
					</tr>
				</thead> 
				<tbody> 
				<tr> 
					<th align="right"><h3>Userame</h3></th> 
					<td><div><input type="text" name="username" id="username" class="validate[required] textfld" value="" ></div></td> 
					<td>&nbsp;</td> 
				</tr> 
				<tr> 
					<th align="right"><h3>Password</h3></th> 
					<td><div><input type="password" name="password" id="password" class="validate[required] textfld" value="" ></div>			</td> 
					<td>&nbsp;</td> 
				</tr>
				<tr> 
					<td></td> 
					<td><input type="submit" name="Submit" value="Login" class="insert"/></td> 
					<td></td> 
				</tr> 
			</tbody> 
		</table>
	</form>';
}

?>