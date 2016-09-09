<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css"/>
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" style="width: 100%; height: 150px;" />
	
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
							
				<h1 style="text-align: center; color: #369;"> ADMIN LOGIN</h1><br><br><br><br>
		<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table style="width: 300; border:0; align:center;">
		
			<tr>
				<td>User Name :</td>
				<td><input type="text" name="adusername" class="textInput" placeholder="E-mail Id"></td>
			</tr>

			<tr>
				<td>Password :</td>
				<td><input type="password" name="adpassword" class="textInput" placeholder="Password"></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Login"></td>
			</tr><br><br><br>
		</table>
	<br><br><br>
</form><br><br>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['adusername']) && !empty($_POST['adpassword'])) {
	$user=$_POST['adusername'];
	$pass=$_POST['adpassword'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM admin WHERE Email='".$user."' AND Password='".$pass."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbusername=$row['Email'];
	$dbpassword=$row['Password'];
	$Name=$row['Name'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$Name;


	/* Redirect browser */
	header("Location: admin.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>


			</div>


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
