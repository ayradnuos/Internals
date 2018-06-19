<html>
<head>
<script type="text/javascript" src="sscript.js"></script>
<style>
		#viewmarks,#internal{
			
				border:1px solid gray;
				background:rgba(0,0,0,0.5);
				color:lightgray;
				
			}
		#viewmarks:hover,#internal:hover{
				background:rgba(0,0,0,0.65);
			}
			
		body{
				background-image:url("design4.jpg");
				background-size:cover;
				color:black;
			}
			#submit{
				background:rgba(100,100,100,0.15);
				border:none;
				color:lightgray;
				font-size:18px;
				padding:10px;
				cursor:pointer;
			}
			#submit:hover{
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
			}
			
</style>
</head>
<body style="padding:50px;">
<?php
	$reg=$_POST['reg'];
	$dob=$_POST['dob'];
	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,'internals');
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
	
	$sql="select * from student where Regno='$reg' and DOB='$dob';";
	$result=$conn->query($sql);
	$rows=$result->num_rows;
	
	if($rows==0)
		{
		 echo '<script type="text/javascript">alert("Login unsuccessful.");window.location.href = "index.html";</script>';
		}
	$row=$result->fetch_assoc();
	$name=$row['Name'];
	$sec=$row['Sec'];
	$sem=$row['Sem'];
	$mentor=$row['mentor'];

	$conn->close();

?>
<center>
<h1>Welcome <?php echo $name;?>,</h1>
<h4><?php echo "Register number: <label id='regno'>".$reg."</label>";?><br>
<?php echo "Semester: ".$sem;?><br>
<?php echo "Section: ".$sec;?><br>
<?php echo "Mentor ID: ".$mentor;?><br></h4>

<div id="viewmarks" onmouseleave="viewutout()">
	<form name="mentor" method="GET" action="view.php">
		<input type="hidden" name="Regno" value='<?php echo $reg;?>'>
		<br><input id="submit" type="submit" value="View records"/>
	</form>
</div>
<div id="viewmarks"><h3 onclick="back()">Log out</h3></div>
</center>
</body>
</html>
