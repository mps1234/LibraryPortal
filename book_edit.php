<!DOCTYPE html>
<html>
<head>
	<title>Edit Book Details</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<!--<link rel="stylesheet" type="text/css" href="tablestyle.css">-->
</head>

<body>
	<div id="header">
		<img src="logo.png" name="logo" alt="logo" style="width: 100%; height: 150px;">
		<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
	</div>

<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				
				<?php
 					$server = "localhost"; 
					$user = "root";
 					$password = "";
 					$database = "library"; 
 					mysql_connect($server,$user,$password) or die ("Connection Fails"); 
 					mysql_select_db($database) or die ("Database Not Found");
 					$data = mysql_query("SELECT * FROM book WHERE Bid='$_GET[bid]'");
 					$r=mysql_fetch_array($data);
 
 					echo "<h2 style='text-align:center;'>Edit Book</h2><hr> 
 						  <form method='POST' action='update_book.php'> 
 						  <table> 
 						  <tr> <td>Book ID : </td>
 					  	  <td><input type='text' name='bid' value='$r[Bid]'></td> </tr> 
 
 						  <tr> <td>Book Name : </td>
 						  <td><input type='text' name='bname' value='$r[Bname]'></td> </tr>
 
 						  <tr> <td>Subject : </td> <td><input type='text' name='subject' value='$r[Subject]'></td> 
 						  </tr> 
 
 						<tr> <td>Author :</td> <td><input type='text' name='author' value='$r[Author]'></td> </tr>
 
 						<tr> <td>Availability :</td> <td><input type='text' name='availability' value='$r[Availability]'></td> </tr>
 
 					 <tr> <td><input type='submit' value='Update'></td> 
 					</tr> 
 
 			</table>
 
 	</form>"; 
 ?>
				
			<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				


				
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
