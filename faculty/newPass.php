<?php 
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
}
else
{ 
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=md5($_POST['password']);
  $con=mysqli_connect("localhost","root","","library");
  
  $select=mysqli_query($con,"UPDATE facultydetails SET password='$pass' where md5(email)='$email'");
  header("Location:faculty_login.php");
}}
?>