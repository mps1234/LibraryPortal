<!DOCTYPE html>
<html>
<head>
	<title>Admin Register</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css">
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
							
				<h1 style="text-align: center; color: #369;"> ADMIN REGISTRATION</h1><br><br>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table style="width: 300; border:0; align:center;">





			<tr>
				<td>Name :</td>
				<td><input type="text" name="name" class="textInput"></td>
			</tr>

			<tr>
				<td>Email :</td>
				<td><input type="email" name="email" class="textInput"></td>
			</tr>

			<tr>
				<td>Password :</td>
				<td><input type="password" name="pass" class="textInput"></td>
			</tr>

			<tr>
				<td>Contact No. :</td>
				<td><input type="tel" name="contactno" class="textInput"></td>
			</tr>


			<tr>
				<td>Address :</td>
				<td><textarea rows="4" cols="22" name="add" ></textarea></td>
			</tr>


		<tr>

			<td><input type="submit" name="submit" value="Create"><a href=""></td>
			<td><input type="submit" name="reset" value="Reset"><a href=""></td>

		</table>
	</td>
</form>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['name']) && !empty($_POST['pass']) ) {
	$name=$_POST['name'];
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$contact=$_POST['contactno'];
	$address=$_POST['add'];
	$pass=md5($pass);
	

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM admin WHERE Email='".$email."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO admin(Name,Email,Password,contactno,Address) VALUES('$name','$email','$pass','$contact','$address')";

	$result=mysql_query($sql);


	if($result){
	echo "Account Successfully Created";
	header("Location:admin.php");
	} else {
	echo "Failure!";
	}

	} else {
	echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>






</tr>
</table>
<br><br><br><br><br><br><br>	
				
				
				
			</div>
			<div class="col2">
				
					<br><a href="admin_login.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Admin Login</b><br>
				
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
