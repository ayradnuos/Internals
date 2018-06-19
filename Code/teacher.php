<html>
<body>
<?php
	$option = $_GET['option'];
	$tid = $_GET['tid'];
	echo $option;

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	if($option=="A")
	{
		$teacher=$_GET['teachname'];
		$tpass=$_GET['tpass'];
		echo $tid.$tpass;
		
		$sql="insert into teacher values($tid,'$teacher','$tpass');";
		echo $sql;

	
	if($conn->query($sql)==TRUE)
		echo "<script>alert('Teacher added.');history.go(-1);</script>";
	 else
		echo "<script>alert('Teacher not added.');location.href='oops.html';</script>";
	}
	else{
		$sql="delete from teacher where tid=$tid;";
		
	echo $sql;

	
	if($conn->query($sql)==TRUE)
		echo "<script>alert('Teacher removed.');history.go(-1);</script>";
	 else
		echo "<script>alert('Teacher not removed.');location.href='oops.html';</script>";
	}
		$conn->close();
?>

</body>
</html>
