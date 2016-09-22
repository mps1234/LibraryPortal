<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	echo "You are already logged in as ".$_SESSION['sess_user_a'];
          header("Refresh:2;url=admin.php");
	
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
</head>

<style>

.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}
.alert2 {
    padding: 20px;
    background-color: red;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
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
				
				<td><input type="submit" name="submit" value="Login"></td>
				<td><input type="submit" name="forgotPassword" value="Forgot Passsword"></td>
			</tr><br><br><br>
		</table>
	<br><br><br>
</form><br><br>

<?php
if(isset($_POST["forgotPassword"])){
	header("Location:forgotpassword.php");
}
if(isset($_POST["submit"])){

if(!empty($_POST['adusername']) && !empty($_POST['adpassword'])) {
	$user=$_POST['adusername'];
	$pass=$_POST['adpassword'];

	$con=mysqli_connect("localhost","root","","library");
	$query=mysqli_query($con,"SELECT * FROM admin WHERE Email='".$user."' AND Password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
	$dbusername=$row['Email'];
	$dbpassword=$row['Password'];
	$Name=$row['Name'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user_a']=$Name;


	/* Redirect browser */
	header("Location: admin.php");
	}
	} else {
	echo "<div class='alert2' style='text-align:center;'>
  <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> Invalid username or password!</div>";
	}

} else {
	echo  "<div class='alert2' style='text-align:center;'>
  <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> All fields are required!</div>";
}
}
?>


			</div>

			<div class="col2">
			<br><br>
				<a href="index.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>

			

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
<?php } ?>
