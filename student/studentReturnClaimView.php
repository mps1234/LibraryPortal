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
	<title>CLAIM VIEW</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen4.css">
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width: 100%; height: 120px;">
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
					<h1 align="center" > <font color="#369"><u>Student Details</u></font></H1>
					<br><br>
<?php
	
	$con=mysqli_connect("localhost","root","","library");
	$mid=$_SESSION['mid'];
	$result=mysqli_query($con,"SELECT * FROM issuebook where Mid='$mid'");
	 echo "<table class='TFtable'> 
			  <th>Issue ID</th>
			  <th>Member Id</th> 
			  <th>Member Name</th>
			  <th>Book ID</th> 
			  <th>Book Name</th> 
			  <th>Issue Date </th> 
			  <th>Action</th>";
 $no=1;
 while($r=mysqli_fetch_assoc($result))
	 { 
			 echo "<tr>
			 <td>$r[Issue_id]</td> 
			 <td>$r[Mid]</td>
			 <td>$r[Name]</td> 
			 <td>$r[Bid]</td>
			 <td>$r[Bname]</td>
			 <td>$r[Issue_date]</td>
			 <td><a href='studentReturnClaim.php?Issue_id=$r[Issue_id]'>Return Request</a></td> 
			 </tr>";
			 $no++; 
	 }
 echo "</table>"; 
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
<div id="footer" >
    <p>&copy; Online Library Portal</p>
	<p><a href="#">Mayur Pathak, Nakshatra Pradhan & Akshat Srivastava</a></p>
</div>
</body>
</html>
<?php
}
?>