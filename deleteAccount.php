<?php 
session_start();
if(!isset($_SESSION["sess_user_a"])){
	header("Location:admin_login.php");
} else 
{
?>
<?php 
	$server = "localhost"; 
	$user = "root";
 	$password = "";
 	$database = "library"; 
 	$con=mysqli_connect($server,$user,$password,$database) or die ("Connection Fails"); 
 	
	$name=$_SESSION['sess_user_a'];
	
		mysqli_query($con,"DELETE FROM admin WHERE Name='".$name."'");
        
	    
 header("location:delAccountAfter.php");	
   ?>
<?php
}
?>