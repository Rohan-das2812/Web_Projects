<?php
session_start();
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="new1.css">
</head>
<body>
<a href="admin.php"><img src=pics\d.png class="pic"></a>
<form  method="post" action="<?php ($_SERVER['PHP_SELF']); ?>" align="center">

--Select Blood Group--:      <select name=b><option>choose group</option>
				<option>A+</option>
				<option>A-</option>
				<option>B+</option>
				<option>B-</option>
				<option>AB+</option>
				<option>AB-</option>
				<option>O+</option>
				<option>O-</option>
		</select>
<br>
Units to add:<input type=number name=u>
<br>
<br><br>
<input type="submit" name="Login" value="Submit">
<input type="reset">
</form>


<?php
if(isset($_POST['b'])) 
{ 	$bg=$_POST['b'];
 	$u2=$_POST['u'];
	$conn=mysqli_connect('localhost','root','','p');
	$qry="select * from blood";
	$res=mysqli_query($conn,$qry);
 
	if(mysqli_num_rows($res)>0)
	{			
		while($row=mysqli_fetch_assoc($res))
   	    { 		

    			if($row['bg']==$bg) 
				{   $u1=$row['unit'];
					$u=$u1+$u2;

					break;
				}
		}
	}
	

	$qryy="update blood SET unit=$u WHERE bg='$bg'";
	$ress=mysqli_query($conn,$qryy);
	if($ress)
		echo "upddated";
	else
		echo "not upddated";

}





?>




</body>
</html>

