<html>
<body>
<?php
	$tid = $_GET['tid'];
	$sem = $_GET['sem'];
	$option = $_GET['assign2'];
	$sec = $_GET['sec'];

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	if($option=='A')
	{
		$sql="insert into classincharge values($sem,'$sec',$tid);";
		echo $sql;

	
	 if($conn->query($sql)==TRUE)
		echo "<script>alert('Class-in-charge assigned.');history.go(-1);</script>";
	 else
		echo "<script>alert('Class-in-charge not assigned.');location.href='oops.html';";
	}
	else{
		$sql="update classincharge set tid=$tid where Sem=$sem and Sec='$sec';";
		echo $sql;

	
	 if($conn->query($sql)==TRUE)
		echo "<script>alert('Class-in-charge re-assigned.');history.go(-1);</script>";
	 else
		echo "<script>alert('Class-in-charge not re-assigned.');location.href='oops.html';";
	}
		
	
	
		$conn->close();
?>

</body>
</html>
