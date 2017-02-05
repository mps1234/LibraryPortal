<?php 
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(isset($_SESSION["sess_user"])){
	header("location:faculty.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty login</title>
	
	
	<link rel="stylesheet" type="text/css" href="screenf.css" media="screen" />
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" />
	
	<p id="layoutdims">Welcome to Online Library Management System</p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				
				<h1 align="center" > <font color="#369">FACULTY LOGIN</font></h1><br><br>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="8" cellspacing="3" bgcolor="#FFFFFF" >

<tr>
<td width="78"><B>Username</B></td>
<td width="6">:</td>
<td width="294"><input name="memusername" type="text" placeholder="Faculty Number"></td>
</tr>
<tr>
<td><b>Password</b></td>
<td>:</td>
<td><input name="mempassword" type="password" placeholder="Password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Login">	 <a href="forgotPassword.php">Forgot Password ?</a></td>

</tr>
</table>
</td>
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['memusername']) && !empty($_POST['mempassword'])) {
	$user=$_POST['memusername'];
	$pass=md5($_POST['mempassword']);
	 
	$con=mysqli_connect("localhost","root","","library");

	$query=mysqli_query($con,"SELECT * FROM facultydetails WHERE facultyNo='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
	$dbuser=$row['name'];
	$dbusername=$row['facultyNo'];
	$dbpassword=$row['password'];
	}

	if(strcasecmp($user, $dbusername)==0 && strcmp($dbpassword, $pass)==0)
	{
	session_start();
	$_SESSION['sess_user']=$dbuser;
	$_SESSION['mid']=$dbusername;

	/* Redirect browser */
	header("Location: faculty.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>
</tr>
</table><br><br><br><br><br><br><br>
			</div>
			<div class="col2">
			<br><br><br>
			<h2><a href="../index.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Back</a></h2><br>
			<h2><a href="../registration.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Registration</a></h2><br>
					
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
<?php } ?>s