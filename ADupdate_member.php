<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
}
else if(!isset($_SESSION["sess_user_a"])){
	header("location:admin_login.php");
}
else
{ 
?><?php 
$server = "localhost"; 
$user = "root";
 $password = "";
 $database = "library"; 
 
	$con=mysqli_connect("localhost","root","","library"); 
$query=mysqli_query($con,"UPDATE member SET Name = '$_POST[Name]', Email = '$_POST[Email]', Branch = '$_POST[Branch]', Year = '$_POST[Year]', ContactNo = '$_POST[ContactNo]', Address = '$_POST[Address]' WHERE Mid = '$_POST[mid]'"); 


header ('location:ADview_member.php'); 
}
?>