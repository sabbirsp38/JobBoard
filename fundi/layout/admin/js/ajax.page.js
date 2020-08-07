function searchSuggest(classs,files) {
	if (searchReq.readyState == 4 || searchReq.readyState == 0) {
		var str = escape(document.getElementById('txt_search').value);
		searchReq.open("GET", 'inc/ajax.suggest.php?search=' + str + "&class=" + classs + "&file=" + files, true);
		searchReq.onreadystatechange = handleSearchSuggest; 
		searchReq.send(null);
	}		
}