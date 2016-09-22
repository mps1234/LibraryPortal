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
	<title>Edit Member</title>
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
				<br>


				<?php
 					$server = "localhost"; 
					$user = "root";
 					$password = "";
 					$database = "library"; 
 					
	$con=mysqli_connect("localhost","root","","library");
 
 					$data = mysqli_query($con,"SELECT * FROM member WHERE Mid='$_GET[mid]'");
 					$r=mysqli_fetch_array($data);
  
 echo "<h2 style='text-align:center;'>Edit Account</h2><hr> 
 <form method='POST' action='ADupdate_member.php'> 
 <table border='0'> 
 <tr> <td>Name : </td>
 <td><input type='text' name='Name' value='$r[Name]'></td> </tr> 
 
 <tr> <td>RollNo : </td>
 <td><input type='text' name='mid' value='$r[Mid]'></td> </tr>
 
 <tr> <td>Email : </td> <td><input type='text' name='Email' value='$r[Email]'></td> 
 </tr> 
 
 <tr> <td>Password :</td> <td><input type='text' name='Password' value='$r[Password]'></td> </tr>
 
 <tr> <td>Branch</td> <td><input type='text' name='Branch' value='$r[Branch]'></td> </tr>
 
 <tr> <td>Contact No:</td> <td><input type='text' name='ContactNo' value='$r[ContactNo]'></td> </tr>
 
 <tr> <td>Address :</td> <td><textarea name='Address' col='25' rows='5'>$r[Address]</textarea></td> </tr>
 

 
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
	
	
	
</div>

</body>
</html>
<?php } ?>
