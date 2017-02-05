<!DOCTYPE html>
<html>
<head>
	<title>faculty registration</title>
	
	
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

	
	<h1 id="layoutdims">Welcome to Online Library Management System</h1>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
			
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
			<h2><a href="logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
			
			<a href="faculty_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Personal info</b></a><br><br>

			</div>
			<div class="col3">
				<h1 style="color:#000000;">Available Books</h1>
<div style="float:left;width:50%;height:60%;border:1px solid black;margin:auto;overflow:scroll;margin-top:0%;background-color:#F4A460;">
<?php
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");
	$_SESSION['count']=0;
	$avail="yes";

	$result = mysql_query("SELECT * FROM book WHERE avail='".$avail."'");
	while($row = mysql_fetch_array($result))
	{
?>	
	<?php if($_SESSION['count']==0) { ?>
	<table>
	<tr>
	<th>Book Name</th>
	<th>Subject</th>
	<th>Author Name</th>
	</tr>
	<?php } ?>
	<tr>
	<td><?php echo $row['BName'];?></td>
	<td><?php echo $row['Subject'];?></td>
	<td><?php echo $row['Subject'];?></td>
	</tr>
	<?php $_SESSION['count']+=1;
	?>
	</table>
<?php

 }
 if($_SESSION['count']==0)
 {
 	echo "No Book In Database";
 }
 ?>
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
