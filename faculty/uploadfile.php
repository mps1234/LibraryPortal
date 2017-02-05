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

 $targetfolder = "uploads/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {	$con=mysqli_connect("localhost","root","","library");
	$result = mysqli_query($con,"INSERT INTO upload(link) VALUES('$targetfolder')");


 echo "File Upload Redirecting in 1 sec";
 header('Refresh: 1; URL=blog.php');
 }

 else {

 echo "Problem uploading file ";
 echo "Redirecting in  sec";
 header('Refresh: 1; URL=blog.php');

 }
}
 ?>