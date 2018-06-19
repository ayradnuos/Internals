<html>
 <head>
	<script type="text/javascript" src="tscript.js"></script>
	<style>
		body{
				background-image:url("ssn.png"),url("design4.jpg");
				background-size:200px 100px,cover;
				background-position:right bottom,center;
				background-repeat:no-repeat,no-repeat;
				color:rgb(20,20,20);
			}
		#marks,#upstud,#classrec,#incharge,#mentor{
				border:1px solid gray;
				background:rgba(0,0,0,0.5);
				color:lightgray;
			}
		#marks:hover,#upstud:hover,#classrec:hover,#incharge:hover,#mentor:hover{
				background:rgba(0,0,0,0.65);
			}
	</style>
 </head>
 <body style="padding:50px 100px;">
	<?php
	
	$id = $_POST['tid'];
	$password = $_POST['tpass'];
	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,'Internals');
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
		
	$sql="select * from teacher where tid='$id' and password='$password';";
	$result=$conn->query($sql);
	$rows=$result->num_rows;

	if($rows==0)
		{
		 echo '<script type="text/javascript">alert("Login unsuccessful.");back();</script>';
		}
	$row=$result->fetch_assoc();
	$tname=$row['Name'];
	
	$sql="select * from assign where tid='$id';";
	$result=$conn->query($sql);
	$rows=$result->num_rows;
	$resultcopy=$result;
	$sublist='';
	while($row=$result->fetch_assoc())
		$sublist.=$row['Subject'].' ';
	
	$mentorsql="select * from student where mentor=$id;";
	$mentorresult=$conn->query($mentorsql);
	$mentorrows=$mentorresult->num_rows;
	
	$classsql="select * from classincharge where tid='$id';";
	$classresult=$conn->query($classsql);
	$classrows=$classresult->num_rows;
	$classrow=$classresult->fetch_assoc();
	
	?>

	<center>
	<h1>Hello <?php echo $tname;?>,</h1>
	ID: <label id='tid'><?php echo $id;?></label>
	Subjects: <?php echo $sublist;?>
	<?php if($classrows!=0)
			echo "Class-in-charge: Sem-".$classrow['Sem']." Sec-".$classrow['Sec'];?>
	<!--<div id="main" style="padding:0px; border:0px solid black; background:rgba(0,0,0,0.5); color:lightgray;">-->
	<div id="marks"><h3 onclick="marks()">Enter marks</h3></div>
	<div id="upstud"><h3 onclick="upstud()">Update student record</h3></div>
	<div id="classrec"><h3 onclick="classrec()">View class records</h3></div>
	<?php if($classrows>0)
			echo '<div id="incharge"><h3 onclick="incharge()">Class-in-charge Records</h3></div>';
		  if($mentorrows>0)
			echo '<div id="mentor"><h3 onclick="mentor()">Mentor Records</h3></div>';
			$conn->close();

	?>
	<div id="marks" onclick="alert('Logged out!');back()"><h3>Log out</h3></div>

	</center>
 </body>
</html>