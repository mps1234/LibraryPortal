<?php 
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Details</title>
	
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
$con=mysqli_connect("localhost","root","","library");
	
	$mid=$_SESSION['mid'];

	$nameEr=$passwordEr=$addressEr=$emailEr=$departmentEr="";
	$name=$password=$department=$email="";
	$contact_no=$year=$address="";
	$contact_noEr=$yearEr="";

if(isset($_POST["submit"])){

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['department']) && !empty($_POST['year'])&& !empty($_POST['contactno']) && !empty($_POST['address'])) 
{
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$department=$_POST['department'];
	$year=$_POST['year'];
	$contact_no=$_POST['contactno'];
	$address=$_POST['address'];
	
	
		if(empty($_POST["name"]))
		{
			$nameEr="Name Required";
		}
		else
		{
			$name=trim($name);
			$name=stripcslashes($name);
			$name=htmlspecialchars($name);
			$name=($_POST['name']);
			
			if (!preg_match("/^[a-zA-Z ]*$/",$name))
			{
			    $nameEr = "Only letters and white space allowed"; 
			}
		}
		if(empty($_POST["department"]))
		{
			$departmentEr="Department Required";
	
		}
		else
		{
			$department=$_POST['department'];
		}
		if(empty($_POST["year"]))
		{
			$yearEr="Year Required";
		}
		else
		{
			$year=$_POST['year'];
			if($year>4||$year<0)
			{
				$yearEr="Invalid Year";
			}
		}
		if(empty($_POST["address"]))
		{
			$addressEr="Address Required";
		}
		else
		{
			$address=trim($address);
			$address=stripcslashes($address);
			$address=htmlspecialchars($address);
			$address=$_POST['address'];
			
			
		}
		if(empty($_POST["contactno"]))
		{
			$contact_noEr="Contact Required";
		}
		else
		{
			$contact_no=$_POST['contactno'];
			if(strlen($contact_no)>10)
			{
				$contact_noEr="Should be of 10 digits";
			}
			else if(strlen($contact_no)<10)
			{
				$contact_noEr="Should be of 10 digits";
			}
			
		}
		if(empty($_POST["email"]))
		{
			$emailEr="Cannot Left Blank";
		}
		else
		{
			$email=$_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
     			$emailEr = "Invalid email format"; 
    		}
		}
		
		if($nameEr==""&&$addressEr==""&&$emailEr==""&&$departmentEr==""&&$contact_noEr==""&&$yearEr=="")
		{
	
			$query=mysqli_query($con,"UPDATE facultydetails SET name = '$name', email = '$email',  department= '$department', year = '$year', contactNo = '$contact_no', address = '$address' WHERE facultyNo = '$mid'");
			$_SESSION['sess_user']=$name;
			header("location:faculty_details.php");	
		}

}

}
	

	

$result = mysqli_query($con,"SELECT * FROM facultydetails WHERE facultyNo='".$mid."'");
while($row = mysqli_fetch_array($result))
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
<td width="294"><input name="name" type="text" value="<?php echo $row['name'];?>" required><span class="error">*<?php echo $nameEr;?></span></td>
</tr>
<tr>
<td width="78"><B>Email</B></td>
<td width="6">:</td>
<td width="294"><input name="email" type="text" value="<?php echo $row['email'];?>" required><span class="error">*<?php echo $emailEr;?></span></td>
</tr>

<tr>
<td><B>Department</B></td>
<td>:</td>
<td><select name="department">
	
    <option value="IT">IT</option>
    <option value="CS">CS</option>
    <option value="ME">ME</option>
    <option value="EN">EN</option>
    <option value="EC">EC</option>
    <option value="EI">EI</option>
    
    </select>
    <span class="error">*<?php echo $departmentEr;?></span>
 </td>
</tr>
<tr>
<td><B>Year</B></td>
<td>:</td>
<td><select name="year">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select>
<span class="error">*<?php echo $yearEr;?></span>
</td>
</tr>
<tr>
<td width="78"><B>Contact no</B></td>
<td width="6">:</td>
<td width="294"><input name="contactno" type="tel" value="<?php echo $row['contactNo'];?>" required><span class="error">*<?php echo $contact_noEr; ?></span></td>
</tr>
<tr>
<td width="78"><B>Address</B></td>
<td width="6">:</td>
<td width="294"><input name="address" type="text" value="<?php echo $row['address'];?>" required><span class="error">*<?php echo $addressEr;?><br></span></input></td>
</tr>
<tr>
<td>&nbsp;</td>

<td><input type="submit" name="submit" value="Update"></td>
<td><font color="#6CB5FF"></font>
<?php } ?>

</table>
</td>
</form>

</tr>
</table><br><br><br><br><br><br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
									<br><br><br>
					<h2><a href="../logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
					<a href="faculty_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
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