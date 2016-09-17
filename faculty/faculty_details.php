<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member login</title>
	
	
	<link rel="stylesheet" type="text/css" href="screenf.css" media="screen" />
</head>
<body>

<div id="header">
	
	<font size="12" style="color:blue;">Welcome to Online Library Management System</font>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
					<h1 align="center" > <font color="#369"><u>Faculty Details</u></font></H1>
					<br><br>
				
<?php
$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");
	
	$mid=$_SESSION['mid'];
	

$result = mysql_query("SELECT * FROM facultydetails WHERE facultyNo='".$mid."'");
while($row = mysql_fetch_array($result))
{
 
?>
	<table cellpadding="20" cellspacing="1" border="1" align="center" width="300">
  <tr>
	<tr><th>Name:</th>
	
    <td><?php echo $row['name']; ?>
	
	</tr>
	<tr>
	<th>Faculty No:</th>
	</td><td><?php echo $row['facultyNo']; ?></td>
	</tr>
	<tr>
	<th>Email:</th>
	<td><?php echo $row['email']; ?></td>
	</tr>
	<tr>
	<th>Department:</th>
	<td><?php echo $row['department']; ?></td>
	</tr>
	
	<tr>
	<th>Year:</th>
	<td><?php echo $row['year']; ?></td>
	</tr>
	
	<tr>
	<th>Contact No:</th>
	<td><?php echo $row['contactNo']; ?></td>
	</tr>
	<tr>
	<th>Address:</th>
	<td><?php echo $row['address']; ?></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><a href="demo.php">Edit Details</td></a>
	
	</table>
<?php

 }
 ?>  
		<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->

				

				<a href="faculty.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
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
<?php
}
?>