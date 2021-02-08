<?php
session_start();
?>

<html>
<body>

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
$conn=mysqli_connect('localhost','root','','p');
$qry="select * from blood";
$res=mysqli_query($conn,$qry);
if(mysqli_num_rows($res)>0)
{			
	while($row=mysqli_fetch_assoc($res))
    { 		

    			if($row['unit']==$_POST['u'])
				{   $u1=$row['unit'];
					break;
				}
	}
}

if(isset($_POST['b'])&& !empty($_POST['b']) && !empty($_POST['u'])) 
{ 	$bg=$_POST['b'];
	$u2=$_POST['u'];
	$u=$u1+$u2;
$qryy="update blood SET unit=$u WHERE bg=$bg";
$ress=mysqli_query($conn,$qryy);

}



?>




</body>
</html>

