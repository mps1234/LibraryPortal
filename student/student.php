<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:../faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student main page</title>
	<link rel="stylesheet" type="text/css" href="screen.css"/>
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width: 100%; height: 180px;" />
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div>
	<p style="font-size:25px;">WELCOME,<a style="font-size:22px; background-color:transparent;text-decoration:none; color:#369"; href="student_details.php"><?php echo $_SESSION['sess_user_s']?></a></p>
    </div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<img src="library.jpg" width="100%" />
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br><br>
					<h2><a href="logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
					<a href="student_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Personal info</b></a><br><br>
					<a href="studentViewBook.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Request book</b></a><br><br>
					<a href="studentReturnClaimView.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Return Request</b></a><br>
					<br>
					<a href="recon.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Recommended Books And Papers</b></a><br><br>
				    <a href="deleteAccount.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Deactivate Account</b></a>
				<!-- Column 2 end -->
			</div>
			<div class="col3">
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