// JavaScript Document
function loadSubCat(val,field,child,get){
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
		parseScript(ajaxobject.responseText);
	  }
	}
	var getsub = "inc/ajax.get.php?"+get+"&id="+val+"&field="+field+"&child="+child;
	ajaxobject.open("GET",getsub);
	ajaxobject.send(null);
}