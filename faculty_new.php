<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student main page</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
</head>
<body>

<div id="header">
	<img src="banner.png" name="logo" style="width: 100%; height: 250px;" />
	
	<p id="layoutdims"><marquee><h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2></marquee></p>
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
					<a href="faculty_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Personal info</b></a><br><br>
					<a href="bookNameSearch.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Book Search By Name</b></a><br><br>
					<a href="booksearchgenre.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Book Search By Genre</b></a>
					<br><br>
					<a href="booksearchauthorname.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Book Search By Author</b></a>
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