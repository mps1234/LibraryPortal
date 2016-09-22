<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
}
else if(!isset($_SESSION["sess_user_a"])){
	header("location:admin_login.php");
}
else
{ 
?><!DOCTYPE html>
<html>
<head>
	<title>Edit Book Details</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
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
 					$con=mysqli_connect($server,$user,$password,$database) or die ("Connection Fails"); 
 					
 					$data = mysqli_query($con,"SELECT * FROM book WHERE Bid='$_GET[bid]'");
 					$r=mysqli_fetch_array($data);
 
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

 						<tr> <td>No. of Books :</td> <td><input type='number' name='noofbooks' value='$r[No_of_books]'></td> </tr>
 
 						<tr> <td>Availability :</td> <td><select name='availability' value='$r[Availability]'>
    						<option value='yes'>Yes</option>
    						<option value='no'>No</option>
    					</select></tr>
 
 					 <tr> <td><input type='submit' value='Update'></td> 
 					</tr> 
 
 			</table>
 
 	</form>"; 
 ?>
				
			<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				<br><br>

					<a href="ADview_book.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>


				
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
<?php } ?>
