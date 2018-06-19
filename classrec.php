<html>
<style>
body{
	background-image:url("ssn.png"),url("design4.jpg");
	background-size:200px 100px,cover;
	background-position:right bottom,center;
	background-repeat:no-repeat,no-repeat;
	color:black;
	margin:50px 0px;
	
			}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	padding:10px;
	text-align:center;
}
tr{
	background:rgba(0,0,0,0.25);
}
tr:hover{
	background:rgba(0,0,0,0.65);
	color:lightgray;
}
.red{
	background:rgba(180,0,0,0.5);
}
.orange{
	background:rgba(120,60,0,0.5);
}
.yellow{
	background:rgba(160,160,0,0.5);
}
</style>
<body>
<?php
	$tid = $_GET['tid'];
	$sub = $_GET['sub'];
	$sec = $_GET['sec'];

	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			

	$sql="select * from assign where tid=$tid and subject='$sub' and sec='$sec';";

	 $result=$conn->query($sql);
	 $rows=$result->num_rows;
	 
	 if($rows==0)
	 {
		 echo "<script>alert('Not your class.');</script>";
	 }
	
	
		$sql="select * from $sub where Regno in (select Regno from student where sec='".$sec."');";

	$result=$conn->query($sql);
	$rows=$result->num_rows;

	
?>
<center>
	<table>
	 <tr style="background:rgba(0,0,0,0); color:black;">
		<th>Register No</th>
		<th>UT1</th>
		<th>UT2</th>
		<th>UT3</th>
		<th>IM</th>
	 </tr>
	 <?php
	 for($i=0;$i<$rows;$i++)
	 {
		 $row=$result->fetch_assoc();
		 $color=0;
		 if($row['UT1']<50)
			 $color++;
		 if($row['UT2']<50)
			 $color++;
		 if($row['UT3']<50)
			 $color++;
		 if($color==3)
			echo "<tr class='red'>";
		 else if($color==2)
			echo "<tr class='orange'>";
		else if($color==1)
			echo "<tr class='yellow'>";
		else
			echo "<tr class='green'>";
		 echo "<td>".$row['Regno']."</td><td>".$row['UT1']."</td><td>".$row['UT2']."</td><td>".$row['UT3']."</td><td>".$row['IM']."</td></tr>";
	 }
	 ?>
	</table>
	</center>
			
</body>
</html>