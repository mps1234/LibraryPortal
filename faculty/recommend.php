<?php
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
}
else
{ 
$con=mysqli_connect("localhost","root","","library");
	$bid=$_SESSION['Bid'];

	$result = mysqli_query($con,"SELECT * FROM book WHERE Bid='$bid'");
	$row = mysqli_fetch_array($result);

	$bname=$row['Bname'];
	$result2 = mysqli_query($con,"INSERT INTO bookrecommend(Bid,recommend,Bname) VALUES('$bid','yes','$bname')");

	header("location:blog.php");
}
?>