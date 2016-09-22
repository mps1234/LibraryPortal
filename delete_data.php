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
 mysql_connect($server,$user,$password)
 or die ("Connection Fails"); 
 mysql_select_db($database) or die ("Database Not Found"); 
mysql_query("DELETE FROM member WHERE Mid='$_GET[mid]'"); 
header ('location:ADview_member.php'); 
}
?>