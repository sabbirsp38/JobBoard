// JavaScript Document
function dbconnect(){
	var ajaxobject;
	if (window.XMLHttpRequest){
	  ajaxobject=new XMLHttpRequest();
	} else if (window.ActiveXObject){ 
	  ajaxobject=new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  alert("Your browser does not support Ajax!");
	}
	ajaxobject.onreadystatechange=function(){
	if(ajaxobject.readyState==4) {
		var id = "ajax"+child;
		document.getElementById(id).innerHTML = ajaxobject.responseText;
	  }
	}
	var getsub = "bin/ajax.dbconnect.php";
	ajaxobject.open("GET",getsub);
	ajaxobject.send(null);
}