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
	<title>Student login</title>	
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width:100%">
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h1 style="text-align: center; color: #369;">STUDENT LOGIN</h1><br><br><br><br>
		<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table style="width: 300; border:0; align:center;">
    		<tr>
				<td>User Name :</td>
				<td><input type="text" name="memusername" class="textInput"></td>
			</tr>

			<tr>
				<td>Password :</td>
				<td><input type="password" name="mempassword" class="textInput"></td>
			</tr>
           
    			<td><input type="submit" name="submit" value="Login"></td>
				<td><input type="submit" name="forgotPassword" value="Forgot Password"></td>
    		</tr>
        </table>
        </form>
<?php
if(isset($_POST["forgotPassword"]))
	header("Location:forgotPassword.php");
if(isset($_POST["submit"]))
		{
		if(!empty($_POST['memusername']) && !empty($_POST['mempassword'])) 
		{
			$user=$_POST['memusername'];
			$pass=md5($_POST['mempassword']);

			$con=mysqli_connect('localhost','root','','library') or die(mysqli_error());
			

			$query=mysqli_query($con,"SELECT * FROM member WHERE Mid='".$user."' AND Password='".$pass."'");
			$numrows=mysqli_num_rows($query);
			if($numrows!=0)
				{
			while($row=mysqli_fetch_assoc($query))
				   {
					   $dbuser=$row['Name'];
					   $dbusername=$row['Mid'];
					   $dbpassword=$row['Password'];
				   }

			if($user == $dbusername && $pass == $dbpassword)
				{
					session_start();
					$_SESSION['sess_user_s']=$dbuser;
					$_SESSION['mid']=$dbusername;
				   /* Redirect browser */
				  header("Location: student.php");
				}
			   } 
			   else 
			   {
				  echo "Invalid username or password!";
			   }

        } else 
			{
				echo "All fields are required!";
			}
}
?>
<br><br><br><br><br><br><br>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<a href="../index.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Home Page</b></a><br><br>
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