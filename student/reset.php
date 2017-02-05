<?php 
session_start();
 if(isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?>
<html>
<head>
	<title>FORGOT PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="../student/screen.css">
		<link rel="stylesheet" type="text/css" href="../student/screen5.css">
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width:100%"/>
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<br><br><br>
<?php

if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $con=mysqli_connect("localhost","root","","library");
  $select=mysqli_query($con,"SELECT Email,Password FROM member WHERE md5(Email)='".$email."' and Password='".$pass."'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <form method="POST" action="newPass.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
	<input type="hidden" name="key" value="<?php echo $_GET['key'];?>">
	<input type="hidden" name="reset" value="<?php echo $_GET['reset'] ;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
  else
  {
	  ?>
	  
	  <h1 style="text-align: center; color: #369";>link expired</h1>
<?php
	     header("refresh:1;url=student_login.php");  }
}

?>
<br><br><br><br><br><br>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>
					
				<!-- Column 2 end -->
			</div>
			<div class="col3">
				<!-- Column 3 start -->
					<div id="ads">
					</div>
				<!-- Column 3 end -->
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>&copy; Online Library Portal</p>
	<p><a href="#">Mayur Pathak, Nakshatra Pradhan & Akshat Srivastava</a></p>
</div>
</body>
</html>
<?php
}
?>