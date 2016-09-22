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
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Member</title>
	
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" alt="logo" style="width: 100%; height: 150px;">
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>

<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1" style="overflow-x:auto;">
				<!-- Column 1 start -->
				<br>
				<h2 style="text-align: center;">Faculty Details</h2>
				<?php 
					 $server = "localhost"; 
					 $user = "root";
 					 $password = "";
					 $database = "library"; 
					 $con=mysqli_connect($server,$user,$password,$database)
					 or die ("Connection Fails"); 
					 
					 $data = mysqli_query($con,"SELECT * FROM facultydetails"); 
 	echo "<table border='1' style='overflow-x:auto;'> 
		 <th>Name</th> 
		 <th>Faculty Id</th> 
		 
		 <th>Email</th> 
		 
		 <th>Department</th>  
		  
		 
		 <th>Contact No</th>
		 <th>Address</th>";
		 
 
 
 while ($r=mysqli_fetch_array($data))
 { 
		 echo "<tr>
		 <td>$r[name]</td> 
		 <td>$r[facultyNo]</td>
		 <td>$r[email]</td> 
		 
		 <td>$r[department]</td>
		  <td>$r[contactNo]</td>
		    <td>$r[address]</td>
	
 
 
  </tr>";
 }
 echo "</table>"; 
 ?>
				
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>

					<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>

						<br><br>
				<a href="ADview_member.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
				
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