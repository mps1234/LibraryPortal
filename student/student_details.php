<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:../faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>student login</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen4.css">
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width: 100%; height: 150px;">
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
					<h1 align="center" > <font color="#369"><u>Student Details</u></font></h1>
					<br><br>
<?php

	$con=mysqli_connect("localhost","root","","library");
	$mid=$_SESSION['mid'];
    $result = mysqli_query($con,"SELECT * FROM member WHERE Mid='".$mid."'");
    while($row = mysqli_fetch_array($result))
	{
	 
?>
		<table class="TFtable" >
   	    <tr>
		<tr><th>Name:</th>
		<td><?php echo $row['Name']; ?></td>
		</tr>
		
		<tr>
		<th>Roll No:</th>
		<td><?php echo $row['Mid']; ?></td>
		</tr>
		
		<tr>
		<th>Email:</th>
		<td><?php echo $row['Email']; ?></td>
		</tr>
		
		<tr>
		<th>Branch:</th>
		<td><?php echo $row['Branch']; ?></td>
		</tr>

		<tr>
		<th>Year:</th>
		<td><?php echo $row['Year']; ?></td>
		</tr>
		
		<tr>
		<th>Contact No:</th>
		<td><?php echo $row['ContactNo']; ?></td>
		</tr>
		
		<tr>
		<th>Address:</th>
		<td><?php echo $row['Address']; ?></td>
		</tr>
		
		<tr>
		<td colspan="2" align="center"><a href="studentEdit.php">Edit Details</td></a>
		</tr>
		</table>
		<br><br><br><br><br><br><br><br>
	<?php
	 }
	 ?>  
		<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				<a href="student.php" style="font-size:20px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
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