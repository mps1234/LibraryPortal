<?php 
session_start();
 if(isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?>
<?php 

if(isset($_POST['submit_password'])&&$_POST['key']&& $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=md5($_POST['password']);

  $conn=mysqli_connect("localhost","root","","library");
  
  $select=mysqli_query($conn,"UPDATE member SET Password='$pass' WHERE md5(Email)='$email'");
  header("Location:student_login.php");
}

?>
<?php
}
?>