<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $con=mysqli_connect('localhost','root','','library');
  
  $select=mysqli_query($con,"SELECT Email,Password from admin where md5(Email)='".$email."' and md5(Password)='".$pass."'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <form method="POST" action="newPass.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
	<input type="hidden" name="key" value="<?php echo $_GET['key'];?>">
	<input type="hidden" name="reset" value="<?php echo $_GET['reset'] ;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" value="submit" name="submit_password">
    </form>
   <?php
}
else{
  ?>

  <h1 style="text-align: center; color: #369";>Link expired</h1>

  <?php
  header("refresh:2;url=admin_login.php");}
}
?>



