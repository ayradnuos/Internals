function back(){
	
	window.location.href = "index.html";
}
function marks(){
		var v=document.getElementById('tid').innerHTML;
		document.getElementById("marks").innerHTML='<br><form method="GET" action="marks.php">'
		+'Subject code: <input type="text" name="sub"/>'
		+'<br>Section: <input type="text" name="sec"/>'
		+'<br>UT(1/2/3): <input type="text" name="ut"/>'
		+'<input type="hidden" name="tid" value='+v+'>'
		+'<br><input type="submit" value="Go"/></form>';
	}
	
function upstud(){
		var v=document.getElementById('tid').innerHTML;
		document.getElementById("upstud").innerHTML='<br><form method="GET" action="upstud.php">'
		+'Reg no: <input type="text" name="reg"/>'
		+'<br>Subject code: <input type="text" name="sub"/>'
		+'<br>UT(1/2/3): <input type="text" name="ut"/>'
		+'<br>Marks: <input type="text" name="mark"/>'
		+'<input type="hidden" name="tid" value='+v+'>'
		+'<br><input type="submit" value="Go"/></form>';
	}
	
function classrec(){
	
		var v=document.getElementById('tid').innerHTML;
		document.getElementById("classrec").innerHTML='<br><form method="GET" action="classrec.php">'
		+'<br>Subject code: <input type="text" name="sub"/>'
		+'<br>Section: <input type="text" name="sec"/>'
		+'<input type="hidden" name="tid" value='+v+'>'
		+'<br><input type="submit" value="Go"/></form>';
	}
	
function incharge(){
		
		var v=document.getElementById('tid').innerHTML;
		document.getElementById("incharge").innerHTML='<br><form name="incharge" method="GET" action="incharge.php">'
		+'<input type="hidden" name="tid" value='+v+'>'
		+'<br><input type="submit" value="View records"/></form>';
}

function mentor(){
		
		var v=document.getElementById('tid').innerHTML;
		document.getElementById("mentor").innerHTML='<br><form name="mentor" method="GET" action="mentor.php">'
		+'<input type="hidden" name="tid" value='+v+'>'
		+'<br><input type="submit" value="View records"/></form>';
}
