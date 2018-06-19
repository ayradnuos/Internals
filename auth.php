<html>
<head>
<script type="text/javascript" src="script.js"></script>
<!--<link rel="stylesheet" href="style.css">-->

<style>
		#sub,#teach,#stud,#assignt,#period{
				border:1px solid gray;
				background:rgba(0,0,0,0.5);
				color:lightgray;
				
			}
		#sub:hover,#teach:hover,#stud:hover,#assignt:hover,#period:hover{
				background:rgba(0,0,0,0.65);
			}
			
		body{
				background-image:url("ssn.png"),url("design4.jpg");
				background-size:200px 100px,cover;
				background-position:right bottom,center;
				background-repeat:no-repeat,no-repeat;
				color:gray;
			}
			
</style>
</head>

<body style="margin:100px 200px 10px;">
<?php
	$sname="localhost";
	$user="root";
	$pass="";
	$password=$_POST['adminpass'];
	if($password!="admin")
		{
		 echo '<script type="text/javascript">alert("Login unsuccessful.");back();</script>';
		}
		
	$conn=mysqli_connect($sname,$user,$pass,'Internals');
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
		
	$sql="select * from lockPeriod;";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$lock=$row['ut'];
	
?>
<input type="hidden" value="<?php echo $lock;?>" id="lockval"/>
<center><h1 style="color:#383838;">Welcome Admin,</h1><center>
<!--<div id="main" style="padding:10px; border:0px solid white; background:rgba(0,0,0,0.5); color:lightgray;">-->
<div id="sub"><h3 onclick="sub()">Subject</h3></div>
<div id="teach"><h3 onclick="teacher()">Teacher</h3></div>
<div id="stud"><h3 onclick="student()">Student</h3></div>
<div id="assignt"><h3 onclick="assignt()">Assign</h3></div>
<div id="period"><h3 onclick="period()">Period lock</h3></div>
<div id="stud"><h3 onclick="alert('Logged out');back()">Log out</h3></div>

</body>
</html>