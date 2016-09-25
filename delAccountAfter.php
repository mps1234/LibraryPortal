<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>student registration</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body>
<div id="header">
	 <img src="logo.png" name="logo" width="100%"/>
	 <p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h1 style="text-align: center; color: #369;"><?php
				 
					 echo "Dear ".$_SESSION['sess_user_a'].", your account has been deleted successfully. Thanks for using our Library System.";

					 session_destroy();
					 header("Refresh:4;url=admin.php");
				 ?>
			
			 
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