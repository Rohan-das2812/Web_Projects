<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="new1.css">
</head>
 <body>
<?php
$name=$_POST['t1'];
$bg=$_POST['s1'];
$gender=$_POST['r1'];
$age=$_POST['a1'];
$mob=$_POST['a2'];
$state=$_POST['st'];
$dob=$_POST['d1'];
$email=$_POST['e1'];
$password=$_POST['p1'];
$conn=mysqli_connect('localhost','root','','p');
$sql="insert into signup values('$name','$bg','$gender',$age,'$mob','$state','$dob','$email','$password')";
$result=mysqli_query($conn,$sql);
if($result)
{
	echo "<font class='as'>ACCOUNT SUCCESSFULLY CREATED<br>PLEASE LOGIN WITH YOUR CREDENTIALS TO DONATE OR REQUEST BLOOD.......</font>";
	header('Refresh:1; URL=front.html');
}
else
{	echo"INVALID INPUTS! TRY AGAIN";
	header('Refresh:1; URL=user_signup_input.html');
}


?>

</body>
</html>