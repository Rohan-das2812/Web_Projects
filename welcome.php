<?php
session_start();
?>

<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="new1.css">
</head>

<body background="pics\699.jpg">

<marquee scrollamount="10"  truespeed="40"><h1><p style="color:red;background-color:white;text-align:center;font-family:Arial black;font-size:25px;">Your little share of blood can give many years of life to someone.</p></h1></marquee>

<p align=right><a href="logout.php"><img src="pics\logout.jpeg" alt="trulli" width="80" height="80" align="right" ></a></p>
<a href="donate.php"><img align=left border="0" alt="W3Schools" src="pics\2.jpeg" width="250" height="250" class="dop"></a>
<a href="request.php"><img align=left border="0" alt="W3Schools" src="pics\3.jpeg" width="250" height="250" class="dop"></a>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>




<?php
$con=mysqli_connect('localhost','root','','p');
$qry="select * from request";
$res=mysqli_query($con,$qry);
$qryy="select * from h";
$ress=mysqli_query($con,$qryy);
$c=0;
if(mysqli_num_rows($res)>0)
{	
	while($row=mysqli_fetch_assoc($res))
	{
		if($row['email']==$_SESSION['username'] && $row['status']==1)
		{	echo "STATUS not confirmed";
			break;
		}
		else if($row['email']==$_SESSION['username'] && $row['status']==2)	
		{	echo "<h1 style='color:red';>Your Request has been confirmed</h1>";
			echo "<h1 style='color:#2E2D88';>Please visit any of the following hospital with your request id no.".$row['req_id']."</h1></br>";
			if(mysqli_num_rows($ress)>0)
			{	echo "<table  border=2 cellspacing=20px width=100%>
	<tr>
		<td>STATE</td>
		<td>HOSPITAL NAME</td>
		<td>ADDRESS</td>
		<td>CONTACT NUMBER</td>
	</tr>";
				while($row=mysqli_fetch_assoc($ress))
				{
					if($row['state']==$_SESSION['state'])
					{	echo "<tr><td>".$row["state"]."</td>";
						echo "<td>".$row["hname"]."</td>";
                 				echo "<td>".$row["haddress"]."</td>";
                 				echo "<td>".$row["contact_no"]."</td></tr></br>";
						
					}
				}
			}break;
		}
	}
}

?>

</body>
</html>