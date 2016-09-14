<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty main page</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
</head>

<body>

<div id="header">
	<img src="banner.png" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library1.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library2.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library3.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;"/>
	<script>
	var myIndex = 0;
	carousel();

	function carousel()
	{
    	var i;
    	var x = document.getElementsByClassName("mySlides");
    	for (i = 0; i < x.length; i++)
    	{
    		x[i].style.display = "none";
    	}
    	myIndex++;
    	if (myIndex > x.length)
    	{myIndex = 1}
    	x[myIndex-1].style.display = "block";
    	setTimeout(carousel, 4000); 
	}
</script>
	<p id="layoutdims"><marquee><h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2></marquee></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<img src="librarycenter2.jpg" width="100%" />
				
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
			
				<br><br><br>
					<h2><a href="blog.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Book Recommendation And Research , Notes Upload</a></h2><br>
			
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