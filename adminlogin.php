<?php
session_start();
?>

<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="new1.css">
</head>


<a href="front.html"><img src=pics\d.png class="pic1"></a>

<body background="pics\cat4.jpg">

<br><br><br><br><br><br><br><br>
<form  method="post" action="<?php ($_SERVER['PHP_SELF']); ?>" align="center">
<h3 style="color: white; font-family: Arial Black; font-size: 30px" align="center">Enter Login Details</h3>
 <h1><p style="color: white">Username:</p></h1>
 <input type="text" name=u1>
 <br>
<h1><p style="color: white">Password:</p></h1>
<input type="password" name=p1>
<br><br>
<input type="submit" name="Login" value="Submit">
<input type="reset">
</form>


<?php
if(!empty($_POST['u1']) && !empty($_POST['p1'])) 
{ 
$con=mysqli_connect('localhost','root','','p');
$qry="select * from admin";
$res=mysqli_query($con,$qry);
if(mysqli_num_rows($res)>0)
{	
	while($row=mysqli_fetch_assoc($res))
        { 
		if($row['id']==$_POST['u1'] && $row['pass']==$_POST['p1'])
		{
			$_SESSION['username']=$_POST['u1'];
			$_SESSION['password']=$_POST['p1'];
			header("Location:admin.php");
	}
	else 
{          
echo 'Wrong username or password';
   }            

  }

}


}
?>


</body>



</html>
	