<html>
<body>
<?php
	$tid = $_GET['tid'];
	$sub = $_GET['sub'];
	$option = $_GET['assign1'];
	$sec = $_GET['sec'];

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	if($option=='A')
	{
		$sql="insert into assign values($tid,'$sub','$sec');";
		echo $sql;

	
	 if($conn->query($sql)==TRUE)
		echo "<script>alert('Teacher assigned.');history.go(-1);</script>";
	 else
		echo "<script>alert('Teacher not assigned.');location.href='oops.html';";
	}
	else{
		$sql="update assign set tid=$tid where Subject='$sub' and Sec='$sec';";
		echo $sql;

	
	 if($conn->query($sql)==TRUE)
		echo "<script>alert('Teacher re-assigned.');history.go(-1);</script>";
	 else
		echo "<script>alert('Teacher not re-assigned.');location.href='oops.html';";
	}
		
	
	
		$conn->close();
?>

</body>
</html>
