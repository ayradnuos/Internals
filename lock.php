<html>
<head>
</head>
<body>
<?php 
	$lock=$_GET['lock'];
	$option=$_GET['lockperiod'];
	$sname="localhost";
	$user="root";
	$pass="";
		
	$conn=mysqli_connect($sname,$user,$pass,'Internals');
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
	
	 if($option=='A')
		 $lock++;
	 else	
		 $lock--;
	 
	 $sql="update LockPeriod set ut=$lock;";
	 	 
	 if($conn->query($sql))
	 {if($option=='A')
		 {	
			echo "<script>alert('PERIOD $lock LOCKED.');</script>";
			if ($lock==3)
				echo "<script>location.href='calc.php';</script>";
		 }
		 else
			echo "<script>alert('PERIOD ".($lock+1)." UNLOCKED');</script>";
		echo "<script>history.go(-1);</script>";
	 }
	 else
		 echo "LOCK NO";

?>
</body>
</html>