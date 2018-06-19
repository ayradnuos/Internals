<html>
<body>

<?php
	$option = $_GET['option'];
	$reg = $_GET['regno'];
	echo $option;

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	if($option=="A")
	{
		$student=$_GET['studname'];
		$dob=$_GET['dob'];
		$sec=$_GET['sec'];
		$sem=$_GET['sem'];
		$mentor=$_GET['mentor'];
		
		
		$sql="insert into student values($reg,'$student','$dob',$sem,'$sec',$mentor);";
		echo $sql;
		
	
	if($conn->query($sql)!=TRUE)
		echo "<script>alert('Student not added.');location.href='oops.html';</script>";
	
	$sql="select * from subject where sem=$sem;";
	echo $sql;
	$result=$conn->query($sql);
	$rows=$result->num_rows;
	for($i=0;$i<$rows;$i++)
	{
		$row=$result->fetch_assoc();
		$sub=$row['Code'];
		$sqlins="insert into $sub (regno) values($reg);";
		echo $sqlins;
		if($conn->query($sqlins)==TRUE)
			echo "Success".$sub;
		
	}
		echo "<script>alert('Student added.');history.go(-1);</script>";
	
	}
	else{
		$sql="delete from student where regno=$reg;";
		echo $sql;

	
	if($conn->query($sql)==TRUE)
		echo "<script>alert('Student removed.');history.go(-1);</script>";
	 else
		echo "<script>alert('Student not removed.');location.href='oops.html';</script>";
	}
		$conn->close();
?>

</body>
</html>
