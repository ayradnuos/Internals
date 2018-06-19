<html>
<body>
<?php
	$sub = $_POST['sub'];
	$ut = $_POST['ut'];
	$rows = $_POST['rows'];
	echo $sub.$ut.$rows;

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
			
	$sql='';
	for($i=0;$i<$rows;$i++)
	{
		$mark=$_POST['mark'.$i];
		$reg=$_POST['reg'.$i];
		if($mark!='')
		{
		 $mark=$mark*8/3;
		 if($mark>100)
			 $mark=100;
		 $sql.="update $sub set ut$ut=$mark where regno='$reg';";
		 echo $sql;}
	}
	
	 if($conn->multi_query($sql)==TRUE)
			echo "<script>alert('Marks entered.');history.go(-2);</script>";
	
	else
			echo "<script>alert('Marks not entered.');history.go(-2);</script>";
	
	
		$conn->close();
?>

</body>
</html>