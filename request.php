<?php
session_start();
?>

<html>
<body>

<form  method="post" action="<?php ($_SERVER['PHP_SELF']); ?>" align="center">

--Select Blood Group--:      <select name=u1><option>choose group</option>
				<option>AB+</option>
				<option>B+</option>
				<option>O+</option>
				<option>O-</option>
				<option>AB-</option>
				<option>A+</option></select>
<br>
Units Required:<input type=number name=u>
<br>
<br><br>
<input type="submit" name="Login" value="Submit">
<input type="reset">
</form>


<?php
$u=$_SESSION['username']; 
$t1=0;
if(!empty($_POST['u1']) && !empty($_POST['u'])) 
{ 
$conn=mysqli_connect('localhost','root','','p');
$sql="select * from blood";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0)
{	
	while($row=mysqli_fetch_assoc($res))
        {
		if($row['bg']==$_POST['u1'] &&  $row['unit']>=$_POST['u'] )
		{	$r=rand(1000,9999);
				$un=$_POST['u'];
				$bg=$_POST['u1'] ;
				$t=date('Y/m/d');
			$sqli="insert into request values('$r','$u','2','1','$bg','$un','$t')";
			$result=mysqli_query($conn,$sqli);
			echo "Your request to receive blood have been received</br>";
			echo "Your request ID is ".$r."</br>";
			echo "Please check your status after some time";
			header('Refresh: 5; URL=welcome.php');
			$t1=1;
			break;
		}
		
	}
	if($t1==0)
	{
	echo "Sorry your requirement cannot be fullfilled by us right now</br>";
		 echo "Please REQUEST again later";
		
	}

}
}


?>




</body>
</html>

