<html>
<body>
<?php 
	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,'Internals');
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
	
	$sql="select * from Subject;";
	$result=$conn->query($sql);
	
	while($row=$result->fetch_assoc())
	{
		$sub=$row['Code'];
		echo $sub;
		$sqlsub="select * from $sub;";
		$subresult=$conn->query($sqlsub);
		while($subrow=$subresult->fetch_assoc())
		{
			$reg=$subrow['Regno'];
			$ut1=$subrow['UT1'];
			$ut2=$subrow['UT2'];
			$ut3=$subrow['UT3'];
			$im=($ut1+$ut2+$ut3)/15;
			$sqlim="update $sub set IM=$im where Regno=$reg";
			if($conn->query($sqlim))
				echo "Success.";
		}
	}
	echo "<script>alert('INTERNALS HAVE BEEN CALCULATED.');history.go(-1);</script>";
?>	
</body>
</html>