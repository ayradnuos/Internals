<html>
<body>
<?php
	$tid = $_GET['tid'];
	$sub = $_GET['sub'];
	$reg = $_GET['reg'];
	$ut = $_GET['ut'];
	$mark = $_GET['mark'];


	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			

	$sqllock="select * from LockPeriod;";
	$resultlock=$conn->query($sqllock);
	$rowlock=$resultlock->fetch_assoc();
	$lock=$rowlock['ut'];
	if($ut<=$lock)
		echo "<script>alert('UT PERIOD ALREADY LOCKED. Contact admin.');history.go(-1);</script>";
	
	$sql="select * from assign where tid=$tid and subject='$sub' and sec in (select sec from student where regno=$reg);";
	echo $sql;

	 $result=$conn->query($sql);
	 $rows=$result->num_rows;
	 if($rows==0)
	 {
		 echo "<script>alert('No records found.');</script>";
	 }
	
	else{
		$sql="update $sub set ut$ut=$mark where regno=$reg;";
		echo $sql;

	
	 if($conn->query($sql)==TRUE)
		echo "<script>alert('Updated.');history.go(-1);</script>";
	else
		echo "<script>alert('Update failed.');history.go(-1);</script>";
	 
	}
		
	
	
?>

	
</body>
</html>