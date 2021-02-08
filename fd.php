<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="new1.css">
</head>
 <body>
 	<a href="admin.php"><img src=pics\d.png class="pic"></a>
<table  border=2 cellspacing=20px width=100%>
	<tr>
		<td>NAME</td>
		<td>E-MAIL</td>
		<td>FEEDBACK</td>
		
	</tr>
<?php

$conn=mysqli_connect('localhost','root','','p');
$sql="select * from feedback";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{			
	while($row=mysqli_fetch_assoc($result))
    { 		
    		 echo "<tr><td>".$row["name"]."</td>";
                 echo "<td>".$row["email"]."</td>";
				 echo "<td>".$row["feedback"]."</td></tr></br>";
	}
}
echo "</table>"


?>

</body>
</html>