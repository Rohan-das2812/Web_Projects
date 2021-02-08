
<?php
session_start();

 $r=rand(1000,9000);
$conn=mysqli_connect('localhost','root','','p');
if(isset($_SESSION['username']))
{   $u=$_SESSION['username'];
	$sqll="select * from signup";
	$res=mysqli_query($conn,$sqll);
	if(mysqli_num_rows($res)>0)
	{			
	while($row=mysqli_fetch_assoc($res))
       { 	if ($row['email']==$u) 
       		{	$bg=$row['bg'];
       			break;
       		}
		}
	}
$t=date('Y/m/d');
$sql="insert into request values('$r','$u','1','1','$bg','1','$t')";
$result=mysqli_query($conn,$sql);
echo "Your request to donate blood have been received</br>";
echo "Your request ID is ".$r."</br>";
echo "Please check your status after some time";
header('Refresh: 5; URL=welcome.php');
}
?>