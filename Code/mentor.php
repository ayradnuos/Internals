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
table,th,td,tr{
	border:1px solid black;
	border-collapse:collapse;
	padding:10px;
	text-align:center;
}
td{
	width:100px;
}
#tab{
	width:900px;
	border:1px solid black;
	overflow-x:auto;
	overflow-x:scroll;
	position:relative;
}
.fixedcol{
	position:fixed;
	left:100px;
	width:100px;
	background:rgba(0,0,0,0.25);
	}
.rows{
	background:rgba(0,0,0,0.25);
}
.rows:hover{
	background:rgba(0,0,0,0.65);
	color:lightgray;
}
</style>
<body>
<center>
<?php
	$tid = $_GET['tid'];
	
	$sname="localhost";
	$user="root";
	$pass="";
	
	$conn=mysqli_connect($sname,$user,$pass,"Internals");
	if($conn->connect_error)
		die("connection failure".$conn->connect_error);
			
	
		$sql="select * from student where mentor=$tid;";

	 $result=$conn->query($sql);
	 $rows=$result->num_rows;
	 if($rows==0)
	 {
		 echo "<script>alert('No records found.');</script>";
	 }
	
	else{
		$row=$result->fetch_assoc();
		$sem=$row['Sem'];
		$sec=$row['Sec'];
		$sql='select Code from subject where sem='.$sem.' ;';

		$result=$conn->query($sql);
		$rows=$result->num_rows;
		
		$sqljoin='select student.Name, ';
		$k=1;
		for ($i=1;$i<$rows;$i++)
		{
			$row=$result->fetch_assoc();
			$subname=$row['Code'];
			$sqljoin.=$subname.'.UT1 as UT1'.$k.','.$subname.'.UT2 as UT2'.$k.','.$subname.'.UT3 as UT3'.$k.','.$subname.'.IM as IM'.$k.',';
			$k=$k+1;
		}
		$row=$result->fetch_assoc();
		$subname=$row['Code'];
		$sqljoin.=$subname.'.UT1 as UT1'.$rows.','.$subname.'.UT2 as UT2'.$rows.','.$subname.'.UT3 as UT3'.$rows.','.$subname.'.IM as IM'.$rows;
		$sqljoin.=' from student ';
		$sql='select Code from subject where sem='.$sem.' ;';
		$result=$conn->query($sql);
		for($i=0;$i<$rows;$i++)
		{
			$row=$result->fetch_assoc();
			$subname=$row['Code'];
			$sqljoin.='join '.$subname.' on student.regno='.$subname.'.regno ';
		}
		$sqljoin.='where student.mentor='.$tid.';';

	 $result=$conn->query($sqljoin);
	 $joinrows=$result->num_rows;
	 if($joinrows==0)
	 {
		 echo "<script>alert('No records found.');</script>";
	 }
	
	else{
		$sqlresult=$conn->query($sql);
		
		echo "<div id='tab'><table><tr><th></th>";
		for($i=0;$i<$rows;$i++)
		{
			$row=$sqlresult->fetch_assoc();
			$sub=$row['Code'];
			echo "<th colspan='4'>".$sub."</th>";
		}
		echo "</tr><tr><th class='fixedcol'>Name</th>";
		for($i=0;$i<$rows;$i++)
		{
			echo "<th>UT1</th><th>UT2</th><th>UT3</th><th>IM</th>";
		}
		echo "</tr>";
		for($i=0;$i<$joinrows;$i++)
		{
			$joinrow=$result->fetch_assoc();
			echo "<tr class='rows'><td class='fixedcol'>".$joinrow['Name']."</td>";
			for($j=1;$j<=$rows;$j++)
			{
				echo "<td>".$joinrow['UT1'.$j]."</td><td>".$joinrow['UT2'.$j]."</td><td>".$joinrow['UT3'.$j]."</td><td>".$joinrow['IM'.$j]."</td>";
			}
			echo "</tr>";
		}
		echo "</table></div>";
	}
		
	}
	
?>

</center>
</body>
</html>
