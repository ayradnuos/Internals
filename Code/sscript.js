function back(){
	alert("Logged out!");
	window.location.href = "index.html";
}

function viewmarks(){
	alert("view");
		var v=document.getElementById('regno').innerHTML;
		alert(v);
		document.getElementById("viewmarks").innerHTML='<br><form name="mentor" method="GET" action="view.php">'
		+'<input type="hidden" name="Regno" value='+v+'>'
		+'<br><input type="submit" value="View records"/></form>';
}
