<?php session_start();
if(!isset($_SESSION['sess_user']))
header("location:faculty_login.php");
else
{
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Details</title>
	
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
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
	mysql_select_db('libraryportal') or die("cannot select DB");
	
	$mid=$_SESSION['mid'];
	

$result = mysql_query("SELECT * FROM facultydetails WHERE facultyNo='".$mid."'");
while($row = mysql_fetch_array($result))
{
 
?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >


<tr>
<td width="78"><B>Name</B></td>
<td width="6">:</td>
<td width="294"><input name="name" type="text" value="<?php echo $row['name'];?>"></td>
</tr>
<tr>
<td width="78"><B>Email</B></td>
<td width="6">:</td>
<td width="294"><input name="email" type="text" value="<?php echo $row['email'];?>"></td>
</tr>
<tr>
<td><B>Password</B></td>
<td>:</td>
<td><input name="password" type="text" value="<?php echo $row['password'];?>"></td>
</tr>
<tr>
<td><B>Department</B></td>
<td>:</td>
<td><input name="department" type="text" value="<?php echo $row['department'];?>"></td>
</tr>
<tr>
<td><B>Year</B></td>
<td>:</td>
<td><input name="year" type="text" value="<?php echo $row['year'];?>"></td>
</tr>
<tr>
<td width="78"><B>Contact no</B></td>
<td width="6">:</td>
<td width="294"><input name="contactno" type="text" value="<?php echo $row['contactNo'];?>"></td>
</tr>
<tr>
<td width="78"><B>Address</B></td>
<td width="6">:</td>
<td width="294"><input name="address" type="text" value="<?php echo $row['address'];?>"></input></td>
</tr>
<tr>
<td>&nbsp;</td>

<td><input type="submit" name="submit" value="Update"></td>
<td><font color="#6CB5FF"></font>
<?php } ?>

</table>
</td>
</form>
<?php 

if(isset($_POST["submit"])){

if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['department']) && !empty($_POST['year'])&& !empty($_POST['contactno']) && !empty($_POST['address'])) 
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$department=$_POST['department'];
	$year=$_POST['year'];
	$contact=$_POST['contactno'];
	$address=$_POST['address'];
	

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");
	$query=mysql_query("UPDATE facultydetails SET name = '$name', email = '$email',  department= '$department', year = '$year', contactNo = '$contact', address = '$address' WHERE facultyNo = '$mid'");
header("location:faculty_details.php");	
}
}
	
?>
</tr>
</table><br><br><br><br><br><br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
									<br><br><br>
					<h2><a href="logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
					<a href="faculty_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Personal info</b></a><br><br>
					<a href="faculty.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>

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