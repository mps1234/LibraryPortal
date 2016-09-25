



<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  
  $pass=md5($_POST['password']);
  
  $con=mysqli_connect('localhost','root','','library');
  
  $query=mysqli_query($con,"UPDATE admin SET Password='$pass' where md5(Email)='$email'");
  header("Location:admin_login.php");
}
?>