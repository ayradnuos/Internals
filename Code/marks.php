<html>
<head>
<style>
body{
	background-image:url("ssn.png"),url("design4.jpg");
	background-size:200px 100px,cover;
	background-position:right bottom,center;
	background-repeat:no-repeat,no-repeat;
	color:black;
}
table,th,tr,td{
	text-align:center;
	border:1px solid black;
	border-collapse:collapse;
	padding:5px;
}
</style>
</head>
<body>
<?php
	$tid = $_GET['tid'];
	$sub = $_GET['sub'];
	$sec = $_GET['sec'];
	$ut = $_GET['ut'];

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
	
	$sql="select * from assign where tid=$tid and subject='$sub' and sec='$sec';";

	 $result=$conn->query($sql);
	 $rows=$result->num_rows;
	 if($rows==0)
	 {
		 echo "<script>alert('No records found.');</script>";
	 }
	
	else{
		$sql="select regno from student where Sec='$sec' and sem in (select sem from subject where code='$sub');";
	
	 $result=$conn->query($sql);
	 $rows=$result->num_rows;
	
	}
	
	
?>
<center>
<br><br><br><br><br><br><br><hr><br>
<table><tr style="background:rgba(0,0,0,0.5);"><th>REGISTER NUMBER</th> <th>UT <?php echo $ut;?></th>
<form action='marks2.php' method='POST'>
<?php
	echo "<br>";
	for($i=0;$i<$rows;$i++)
	 {
		$row=$result->fetch_assoc();
		$reg=$row['regno'];
		echo "<tr><td>".$reg."</td>";
		echo "<td><input type='text' name='mark".$i."'/>";
		echo "<input type='hidden' name='reg".$i."' value=$reg></td></tr>";

	 }
	 echo "</table>";
	$conn->close();

?>
<input type="hidden" name="ut" value="<?php echo $ut;?>"/>
<input type="hidden" name="sub" value="<?php echo $sub;?>"/>
<input type="hidden" name="rows" value="<?php echo $rows;?>"/>
<br>
<input type="submit" value="Submit"/>
<br><br><hr>
</form>
</center>
</body>
</html>
