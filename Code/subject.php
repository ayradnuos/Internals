<html>
<body>

<?php
	$option = $_GET['option'];
	$sub = $_GET['sub'];
	echo $option;

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	if($option=="A")
	{
	$name=$_GET['subname'];
	$sem=$_GET['subsem'];
		
		
	$sql="insert into subject values('$sub','$name',$sem);";
	$sql.="create table ".$sub."(Regno int(12) primary key,foreign key(Regno) references student(Regno) on delete cascade,UT1 float,UT2 float,UT3 float,IM int);";
	echo $sql;
	
	
	if($conn->multi_query($sql)==TRUE)
		echo "<script>alert('Subject added.');location.reload();</script>";
	 else
		echo "<script>history.go(-1);</script>";
	
	$sqlstud="select Regno from student where Sem=$sem;";
	echo $sqlstud;
	$studresult=$conn->query($sqlstud);
	$studrows=$studresult->num_rows;
	$sqlins='';
	for($i=0;$i<$studrows;$i++)
	{
		$row=$studresult->fetch_assoc();
		$reg=$row['Regno'];
		echo $reg;
		$sqlins.='insert into '.$sub.' (regno) values ('.$reg.');';
		echo $sqlins;
	}
	if($conn->multi_query($sqlins)==TRUE)
		echo "Students added.";
	}
	else{
		$sql="drop table $sub;";
		$sql.="delete from subject where code='$sub';";
	echo $sql;

	
	if($conn->multi_query($sql)==TRUE)
		echo "<script>alert('Subject deleted.');history.go(-1);</script>";
	 else
		echo "<script>alert('Subject not deleted.');location.href='oops.html';</script>";
	}
		$conn->close();
?>

</body>
</html>
