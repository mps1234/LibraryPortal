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
	<title>Return Book</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>

<body>
<div id="header">
	<img src="logo.png" name="logo" alt="Library" style="width: 100%; height: 150px;">
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>

<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<br><br><br>
				
			<?php 
		$server = "localhost"; 
		$user = "root";
 		$password = "";
 		$database = "library"; 
 		
	$con=mysqli_connect("localhost","root","","library");
 		$data = mysqli_query($con,"SELECT * FROM claimreturn"); 
   			echo "<table border='1' align='center'> 
  			<th>Return claimID</th>
  			<th>Issue Id</th>
			<th>MemberId</th>   
 			<th>Member Name</th>
 			<th>Book ID</th> 
 			<th>Book Name</th> 
  			<th>Return claim date</th> 
			 <th>Action</th>";
 	 	
 	 		$no=1;
 			while ($r=mysqli_fetch_array($data))
 				{ 
 					echo "<tr>
 					<td>$r[claim_return_id]</td> 
 					<td>$r[Issue_id]</td> 
 					<td>$r[Mid]</td>
 					<td>$r[Name]</td> 
 					<td>$r[Bid]</td>
 					<td>$r[Bname]</td>
 					<td>$r[returnclaim_date]</td>
					 <td><a href='ADreturn.php?claim_return_id=$r[claim_return_id]'>Return book</a></td> 
 					</tr>";
   			$no++; 
 			}
 			echo "</table>"; 
 ?>
				
				<br><br><br><br><br><br>
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>

					<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
				
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