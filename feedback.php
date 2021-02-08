<?php
$name=$_POST['n1'];
$email=$_POST['e1'];
$feedback=$_POST['f1'];

$conn=mysqli_connect('localhost','root','','p');
$sql="insert into feedback values('$name','$email','$feedback')";
$result=mysqli_query($conn,$sql);
echo 'Thank you for your valuable feedback';
   header('Refresh:1; URL=front.html');
?>