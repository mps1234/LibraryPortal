<!DOCTYPE html>
<html>
<head>
	<title>Faculty login</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
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
<td><input type="submit" name="submit" value="Login"></td>

</tr>
</table>
</td>
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['memusername']) && !empty($_POST['mempassword'])) {
	$user=$_POST['memusername'];
	$pass=$_POST['mempassword'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM facultydetails WHERE facultyNo='".$user."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbuser=$row['name'];
	$dbusername=$row['facultyNo'];
	$dbpassword=$row['password'];
	}

	if($user == $dbusername && $pass == $dbpassword)
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
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				


				
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
	
	
	
</div>

</body>
</html>
