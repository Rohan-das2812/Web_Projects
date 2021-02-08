<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="new1.css">
   
             </head>
<body>
  <a href="admin.php"><img src=pics\d.png class="pic"></a>
<table border=2 align=left width=100%>
             <strong>    <tr><td>NAME</td>
                  <td>BG</td>
                  <td>GENDER</td>
                 <td>AGE</td>
                 <td>MOB</td>
                <td>STATE</td>
                 <td>DOB</td>
                  <td>EMAIL</td>
                 <td>PASSWORD</b></td></tr>


<?php
$con=mysqli_connect('localhost','root','','p');
$qry="select * from signup";
$res=mysqli_query($con,$qry);
if(mysqli_num_rows($res)>0)
{		
	while($row=mysqli_fetch_assoc($res))
	{
		 echo "<tr><td>".$row["name"]."</td>";
                 echo "<td>".$row["bg"]."</td>";
                 echo "<td>".$row["gender"]."</td>";
	         echo "<td>".$row["age"]."</td>";
                 echo "<td>".$row["mob"]."</td>";
                 echo "<td>".$row["state"]."</td>";
                 echo "<td>".$row["dob"]."</td>";
                 echo "<td>".$row["email"]."</td>";
                 echo "<td>".$row["password"]."</td></tr></br>";
          }       
}
?>
</table>

</body>
</html>

