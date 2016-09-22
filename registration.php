<?php 
session_start();
if(isset($_SESSION["sess_user_a"]))
{
	header("location:admin.php");
} else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
} else
if(isset($_SESSION["sess_user"]))
{
	header("location:faculty/faculty.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
						<img src="library.jpg" style="width: 100%">
					</div>

			<div class="col2">
					<br><br><br>
					<a href="check.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Admin Registration</b></a><br><br>

					<a href="student/student_reg.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Student Registration</b></a><br><br>

					<a href="faculty/faculty_reg.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Faculty Registration</b></a><br><br>
					<a href="index.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</a><br><br>
					
					
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