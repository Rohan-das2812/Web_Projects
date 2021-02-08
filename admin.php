<?php
session_start();
?>

<html>
<head><p align=right><a href="logout.php"><img src="pics\logout.jpeg" alt="trulli" width="80" height="80" align="right"></a></p>
<h1 align="center"><a href="t1.php">CLICK HERE TO VIEW ALL USERS DETAILS</a></h1>
<h1 align='center'><a href='stock.php'>CLICK HERE TO ADD BLOOD TO STOCK</a></h1>
<h1 align='center'><a href='fd.php'>CLICK HERE TO SEE ALL FEEDBACKS</a></h1>;
</head>
 <form  method="post" action="<?php ($_SERVER['PHP_SELF']); ?>" align="center">

Enter request id to confirm:<br>
 <input type="number" name=u1>
<input type="submit" name="confirm" value="Confirm">
<input type="reset">
</form>
  
   
<body bgcolor=beige>
<table border=2 align=left width=100%>
<tr><td>NAME</td>
<td>REQUEST ID</td>
<td>TYPE</td>
<td>STATUS</td>
<td>BLOOD GROUP</td>
<td>UNITS</td></tr>


<?php
 $con=mysqli_connect('localhost','root','','p');
if(isset($_POST['u1']))
{  $req=$_POST['u1'];
	 $qry="update request SET status=2 WHERE req_id=$req";
	 $res=mysqli_query($con,$qry);
}

$qry1="select * from request";
$res1=mysqli_query($con,$qry1);

if(mysqli_num_rows($res1)>0)
{			
	while($row=mysqli_fetch_assoc($res1))
  { 		

    		if(isset($_POST['u1']))
				{   
        			if($row['req_id']==$req)
        			{		$bg=$row['bg'];
        				  $r1=$row['units'];
        			   
        			}
        }
        if($row["status"]==1)
        		$s="PENDING";
        else
        		$s="CONFIRM";
        if($row["type"]==1)
        		$t="Donate";
        else
            $t="Request";
        			
        echo "<tr><td>".$row["req_id"]."</td>";
        echo "<td>".$row["email"]."</td>";
				echo "<td>".$t."</td>";
	      echo "<td>".$s."</td>";
	      echo "<td>".$row["bg"]."</td>";
	      echo "<td>".$row["units"]."</td></tr></br>";
  }
  echo "</table><br><br><br><br><br><br>";
}

if(isset($_POST['u1']))
{  if ($t!="DoNaTe")
   {
        $qry2="select * from blood";
        $res2=mysqli_query($con,$qry2);
        if(mysqli_num_rows($res2)>0)
        {			
	        while($row1=mysqli_fetch_assoc($res2))
          { if($row1['bg']==$bg)
	   	      {
	               	$r2=$row1['unit'];
	               	$r=$r2-$r1;
	               
		              break;
	          }
	        }
        }
        $query="update blood SET unit=$r WHERE bg='$bg'";
        $resul=mysqli_query($con,$query);
    }
}

?>
</body>
</html>
