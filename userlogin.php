<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>User Login</title>
</head>



<body background="pics\bg1.jpg">



 <marquee scrollamount="10"  truespeed="40"><h1><p style="color:red;background-color:white;text-align:center;font-family:Arial black;font-size:25px;">A life may depend on a gesture from you, a bottle of Blood.</p></h1></marquee>
  


<form  method="post" action="<?php ($_SERVER['PHP_SELF']); ?>" align="center">
<h3 style="color:black;background-color:white;text-align:center;font-family:Impact;font-size:25px;" align="center">Enter Login Details</h3>
 <h1 style="font-size: 20px; color: white"><p>Username:</p></h1>
 <input type="text" name=u1>
 <br>
 <h2 style="font-size: 20px; color: white"><p>Password:</p></h2>
<input type="password" name=p1>
<br><br>
<input type="submit" name="Login" value="Submit">
<input type="reset">
</form>


<?php
if(!empty($_POST['u1']) && !empty($_POST['p1'])) 
{ 
	$con=mysqli_connect('localhost','root','','p');
	$qry="select * from signup";
	$res=mysqli_query($con,$qry);
	if(mysqli_num_rows($res)>0)
	{	
		while($row=mysqli_fetch_assoc($res))
	        { 
			if($row['email']==$_POST['u1'] && $row['password']==$_POST['p1'])
			{
				$_SESSION['username']=$_POST['u1'];
				$_SESSION['password']=$_POST['p1'];
				$_SESSION['state']=$row['state'];
				header("Location:welcome.php");
		}
		else 
		{          
			echo "<div style='text-align:center;'><font style='color:white;' >Wrong username or password</font></div>";
	   	}            

	}

	}


}
?>


</body>



</html>
	