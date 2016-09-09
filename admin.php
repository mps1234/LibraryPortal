<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:admin_login.php");
} else {
?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin main page</title>
	
	
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
			
				
				<img src="library.jpg" width="100%" />
				
			</div>
			<div class="col2">
				
					<br>
					<h2><a href="logout.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
					<a href="add_member.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Add Member</b></a><br><br>
					<a href="ADview_member.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>View Member</b></a><br><br>
					<a href="add_books.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Add Book</b></a><br><br>
					<a href="ADview_book.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>View Book</b></a><br><br>
					<a href="ADissueview_book.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Issue book</b></a><br><br>
					<a href="ADreturn_view.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Return book</b></a><br><br>
					<a href="ADfine.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Fine</b></a>
				
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
