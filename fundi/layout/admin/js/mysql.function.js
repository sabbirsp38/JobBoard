// JavaScript Document
checked = false;
var ins = 'Number of records:<br /><input type="text" id="alertName" name="alertName" value="5" class="promptfld" />';
var num = 'You must enter a number:<br /><input type="text" id="alertName" name="alertName" value="5" class="promptfld" />';
var deleteSinglePrompt = 'Are you sure you want to delete this record?';

function parseScript(_source) {
	var source = _source;
	var scripts = new Array();
	while(source.indexOf("<script") > -1 || source.indexOf("</script") > -1) {
		var s = source.indexOf("<script");
		var s_e = source.indexOf(">", s);
		var e = source.indexOf("</script", s);
		var e_e = source.indexOf(">", e);
		scripts.push(source.substring(s_e+1, e));
		source = source.substring(0, s) + source.substring(e_e+1);
	}
	for(var i=0; i<scripts.length; i++) {
		try {
			eval(scripts[i]);
		}
		catch(ex) {
		}
	}
	return source;
}

function tfs_selectAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('tfs_pagination').elements.length; i++) {
		document.getElementById('tfs_pagination').elements[i].checked = checked;
	}
}

function tfs_message(msg) {
	alert(msg);
}

function tfs_actionDelete() {
	document.getElementById('action').value = "delete";
	document.forms['tfs_pagination'].submit();
}

function tfs_actionUpdate () {
	document.getElementById('action').value = "update";
	document.forms['tfs_pagination'].submit();
}

function tfs_changecat () {
	document.forms['cat'].submit();
}

function insertBulk(v,m,f){
	if(v != undefined){
		if(v != 'Cancel'){
			if (f.alertName!=null && f.alertName!="" && !isNaN(f.alertName)){
				window.location = "?n=newbulk&i="+f.alertName;
			}else{
				$.prompt(num,{callback: insertBulk,buttons: { Cancel: 'Cancel', Insert: 'Insert' }});
			}
		}
	}
}

function checkboxvalue(ele, fld, checked, unchecked){
	if(ele.checked == true){
		document.getElementById(fld).value = checked;
	}else{
		document.getElementById(fld).value = unchecked;
	}
}

$(document).ready(function() {
   $("#tfs_update").validationEngine();
});

function tfs_singleDelete(v,m,f){
	thisHref = $(this).attr('href');
	if(v != undefined){
		if(v != 'Cancel' && v != undefined){
			window.location = "?"+v;
		}
	}
}

function tfs_bulkDelete(v,m,f){
	thisHref = $(this).attr('href');
	if(v != undefined){
		if(v != 'Cancel' && v != undefined){
			tfs_actionDelete ();
		}
	}
}

$(document).ready(function() {
	$('.ask-plain').click(function(e) {
		e.preventDefault();
		thisHref	= $(this).attr('href');
		if(confirm('Are you sure you want to delete this item?')) {
			window.location = thisHref;
		}
	});
	
	$('.delete-bulk').click(function(e) {
		e.preventDefault();
		thisHref = $(this).attr('href');
		var chk = 0;
		for (var i = 0; i < document.getElementById('tfs_pagination').elements.length; i++) {
			if(document.getElementById('tfs_pagination').elements[i].checked == true){
				if(document.getElementById('tfs_pagination').elements[i].value != 'all'&&document.getElementById('tfs_pagination').elements[i].value != ''){
					chk += 1;
				}
			}
		}
		if(chk > 0){
			$.prompt('Are you sure you want to delete '+chk+' records?',{callback: tfs_bulkDelete,buttons: { Cancel: 'Cancel', Delete: 'Delete' }});
			
		}else{
			$.prompt('You need to check at least one record.',{ opacity: 0.5 });
		}
		
	});
	
	$('.update-bulk').click(function(e) {
		e.preventDefault();
		thisHref = $(this).attr('href');
		var chk = 0;
		for (var i = 0; i < document.getElementById('tfs_pagination').elements.length; i++) {
			if(document.getElementById('tfs_pagination').elements[i].checked == true){
				if(document.getElementById('tfs_pagination').elements[i].value != 'all'&&document.getElementById('tfs_pagination').elements[i].value != ''){
					chk += 1;
				}
			}
		}
		if(chk > 0){
			window.location = thisHref;
		}else{
			$.prompt('You need to check at least one record.',{ opacity: 0.5 });
		}
	});
});

function getUrlVars(){
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++){
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars.push(hash[1]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

$(function(){
	var btnUpload=$('#upload');
	var status=$('#status');
	var get=getUrlVars();
	new AjaxUpload(btnUpload, {
		action: 'inc/ajax.upload.php?upload='+get,
		name: 'uploadfile',
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				return false;
			}
			status.html('<img src="images/progress.gif" width="16" height="16" />');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response != "error"){
				$('<li></li>').replaceWith('#files').html('<li>'+response+'</li>').addClass('success');
			}else{
				$('<li></li>').appendTo('#files').html(response).addClass('error');
			}
		}
	});
});

$(function(){
	var btnUpload=$('#insimg');
	var status=$('#status');
	var get=getUrlVars();
	new AjaxUpload(btnUpload, {
		action: 'inc/ajax.upload.php?upload='+get,
		name: 'uploadfile',
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				return false;
			}
			status.html('<img src="images/progress.gif" width="16" height="16" />');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response != "error"){
				$('<li></li>').appendTo('#files').html('<li>'+response+'</li>').addClass('success');
			}else{
				$('<li></li>').appendTo('#files').html(response).addClass('error');
			}
		}
	});
});

function get_checked(){
	$("#selected_box").html("");
	$('input[type=checkbox]').each(function () {
			   if (this.checked) {
				   	var currentId = $(this).attr('id');
					if(currentId != "chk_all"){
						$("#selected_box").append('<input name="'+currentId+'" type="hidden" value="'+currentId+'" />');
						
					}
			   }
	});
	$('#assign').submit();
}