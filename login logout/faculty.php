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
					<a href="faculty_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Request book</b></a><br><br>
					<a href="memreturnclaim_view.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Return Request</b></a>
				<!-- Column 2 end -->
			</div>
			<div class="col3">
			
			
						</div>
		</div>
	</div>
</div>
<div id="footer">
	
	
	
</div>

</body>
</html>
<?php
}
?>