function back(){
	window.location.href = "index.html";
}

function sub(){
		document.getElementById("sub").innerHTML='<br><input type="button" onclick="sub1()" value="Add Subject"/>'
		+'<input type="button" onclick="sub2()" value=" Remove Subject"/><br><br>';
}
function sub1(){
		var v='<br><form class="formtable" method="GET" action="subject.php">'
		+'Subject code: <input type="text" name="sub"/>'
		+'<br>Subject name: <input type="text" name="subname"/>'
		+'<br><select name="subsem"><option selected disabled>Semester</option>';
		for(var i=1;i<=8;i++)
		{v=v+'<option>'+i+'</option>';}
		document.getElementById("sub").innerHTML=v+'</select>'
		+'<br><input type="hidden" name="option" value="A">'
		+'<br><input type="submit" value="Go"/></form>';
	}
function sub2()
	{
		document.getElementById("sub").innerHTML='<br><form class="formtable" method="GET" action="subject.php">'
		+'Subject code: <input type="text" name="sub"/>'
		+'<input type="hidden" name="option" value="B">'
		+'<input type="submit" value="Go"/></form>';
	}
function subout()
{
	document.getElementById("sub").innerHTML='<h3 onclick="sub()">Subject</h3>';
}
function teacher(){
		document.getElementById("teach").innerHTML='<br><input type="button" onclick="teacher1()" value="Add Teacher"/>'
		+'<input type="button" onclick="teacher2()" value=" Remove Teacher"/><br><br>';
}
function teacher1(){
		document.getElementById("teach").innerHTML='<br><form class="formtable" method="GET" action="teacher.php">'
		+'Teacher name: <input type="text" name="teachname"/>'
		+'<br>Teacher ID: <input type="text" name="tid"/>'
		+'<br>Password: <input type="text" name="tpass"/>'
		+'<br><input type="hidden" name="option" value="A">'
		+'<br><input type="submit" value="Go"/></form>';
	}
function teacher2()
	{
		document.getElementById("teach").innerHTML='<br><form class="formtable" method="GET" action="teacher.php">'
		+'Teacher ID: <input type="text" name="tid"/>'
		+'<input type="hidden" name="option" value="B">'
		+'<input type="submit" value="Go"/></form>';
	}

function student(){
		document.getElementById("stud").innerHTML='<br><input type="button" onclick="stud1()" value="Add student"/>'
		+'<input type="button" onclick="stud2()" value=" Remove student"><br><br>';
}
function stud1(){
		var v='<br><form method="GET" action="student.php">'
		+'<label>Student name: </label><input type="text" name="studname"/>'
		+'<br><label>Register no: </label><input type="text" name="regno"/>'
		+'<br><label>DOB: </label><input type="date" name="dob"/>'
		+'<br>Semester: <select name="sem"><option selected disabled>Semester</option>';
		for(var i=1;i<=8;i++)
		{v=v+'<option>'+i+'</option>';}
		document.getElementById("stud").innerHTML=v+'</select>'
		+'<br><label>Section: </label><input type="text" name="sec"/>'	
		+'<br><label>Mentor: </label><input type="text" name="mentor"/>'
		+'<br><input type="hidden" name="option" value="A">'
		+'<br><input type="submit" value="Go"/></form>';
	}
function stud2()
	{
		document.getElementById("stud").innerHTML='<br><form method="GET" action="student.php">'
		+'<label>Register no: </label><input type="text" name="regno"/>'
		+'<input type="hidden" name="option" value="B">'
		+'<input type="submit" value="Go"/></form>';
	}
	
function assignt(){
		document.getElementById("assignt").innerHTML='<br><input type="button" onclick="assign1()" value="Subject"/>'
		+'<input type="button" onclick="assign2()" value="Class-in-charge"/><br><br>';
}

function assign1(){
		document.getElementById("assignt").innerHTML='<br><form name="assign1" method="GET" action="assign1.php">'
		+'<input type="radio" name="assign1" value="A">Assign</input>'
		+'<input type="radio" name="assign1" value="B">Re-assign</input>'
		+'<br>Subject code: <input type="text" name="sub"/>'
		+'<br>Teacher ID: <input type="text" name="tid"/>'
		+'<br>Section: <input type="text" name="sec"/>'
		+'<br><input type="submit" value="Go"/></form>';
	}
	
function assign2(){
		var v='<br><form name="assign2" method="GET" action="assign2.php">'
		+'<input type="radio" name="assign2" value="A">Assign</input>'
		+'<input type="radio" name="assign2" value="B">Re-assign</input>'
		+'<br>Teacher ID: <input type="text" name="tid"/>'
		+'<br>Semester: <select name="sem"><option selected disabled>Semester</option>';
		for(var i=1;i<=8;i++)
		{v=v+'<option>'+i+'</option>';}
		document.getElementById("assignt").innerHTML=v+'</select>'
		+'<br>Section: <input type="text" name="sec"/>'
		+'<br><input type="submit" value="Go"/></form>';
	}
	
function period(){
	var unlockval=document.getElementById('lockval').value;
	var lockval=unlockval;
	lockval++;
	var periodlock='<br><form name="lockperiod" method="GET" action="lock.php">';
	if(unlockval<3)
		periodlock+='<input type="radio" name="lockperiod" value="A">Lock period '+lockval+'</input>';
	if(unlockval>0)
		periodlock+='<input type="radio" name="lockperiod" value="B">Unlock period '+unlockval+'</input>';
	document.getElementById('period').innerHTML=periodlock+'<br><br><input type="hidden" name="lock" value="'+unlockval+'"/>'
		+'<input type="submit" value="Update lock"/></form>';
}
