<?php 
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(isset($_SESSION["sess_user"])){
	header("location:faculty.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>faculty registration</title>
	
	
	<link rel="stylesheet" type="text/css" href="screenf.css" media="screen" />
</head>
<style>
.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>

<body>

<div id="header">
	<img src="logo.png" name="logo" align="middle" />
	<?php
	$nameEr=$passwordEr=$addressEr=$emailEr=$departmentEr="";
	$name=$password=$department=$email="";
	$faculty_no=$contact_no=$year=$address="";
	$contact_noEr=$faculty_noEr=$yearEr="";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
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
		if(empty($_POST["password"]))
		{
			$passwordEr="Password Required";
		}
		else
		{
			$password=$_POST['password'];
		}
		if(empty($_POST["mid"]))
		{
			$faculty_noEr="Enter Faculty Number";
		}
		else
		{
			$faculty_no=$_POST['mid'];
			if(strlen($faculty_no)<7)
			{
				$faculty_noEr="Should be of 7-8 digits";
			}
			else if(strlen($faculty_no)>8)
			{
				$faculty_noEr="Should be of 7-8 digits";
			}
			

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
		if($nameEr==""&&$passwordEr==""&&$addressEr==""&&$emailEr==""&&$departmentEr==""&&$contact_noEr==""&&$faculty_noEr==""&&$yearEr=="")
		{
			$password=md5($password);
		
			$conn = mysqli_connect("localhost","root","","library")or die(mysql_error());
			$sql = "INSERT INTO facultydetails(name,password,department,year,email,facultyNo,contactNo,address) VALUES('$name','$password','$department','$year','$email','$faculty_no','$contact_no','$address')";
			if(mysqli_query($conn,$sql))
		{
			
			header("location:faculty_login.php");
		}
		else
			echo "<div class='alert' style='text-align:center;'>
  			<span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
  			<strong>Error Duplicate Faculty ID or Enmail</strong></div>";
			
		}

			
		}
		
		?>

	
	<h1 id="layoutdims">Welcome to Online Library Management System</h1>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
			
				
				<h1 align="center" > <font color="#369">FACULTY REGISTRATION</font></h1><br><br>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<td>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF" >
<p><span class="error">* required field</span></p>
<tr> 
<td width="78"><B>Name</B></td>
<td width="6">:</td>
<td width="294"><input name="name" type="text" placeholder="Name"><span class="error">*<?php echo $nameEr;?></span></td>
</tr>
<tr>
<td width="78"><B>Faculty no</B></td>
<td width="6">:</td>
<td width="294"><input name="mid" type="number" placeholder="Faculty Number"><span class="error">*<?php echo $faculty_noEr;?></span></td>
</tr>
<tr>
<td width="78"><B>Email</B></td>
<td width="6">:</td>
<td width="294"><input name="email" type="email" placeholder="Email Address"><span class="error">*<?php echo $emailEr;?></span></td>
</tr>
<tr>
<td><B>Password</B></td>
<td>:</td>
<td><input name="password" type="password" placeholder="Password"><span class="error">*<?php echo $passwordEr;?></td>
</tr>
<tr>
<td><B>Department</B></td>
<td>:</td>
<td><select name="department">
	<option value=""></option>
    <option value="IT">IT</option>
    <option value="CS">CS</option>
    <option value="ME">ME</option>
    <option value="EN">EN</option>
    <option value="EC">EC</option>
    <option value="EI">EI</option>
    
    </select>
  <span class="error">*<?php echo $departmentEr;?></span></td>
</tr>
<tr>
<td><B>Year</B></td>
<td>:</td>
<td><select name="year">
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select><span class="error">*<?php echo $yearEr;?></span></td>
</tr>
<tr>
<td width="78"><B>Contact no</B></td>
<td width="6">:</td>
<td width="294"><input name="contactno" type="number" placeholder="Contact Number"><span class="error">*<?php echo $contact_noEr; ?></span></td>
</tr>
<tr>
<td width="78"><B>Address</B></td>
<td width="6">:</td>
<td width="294"><input rows="4" cols="22" name="address" placeholder="Address" ><span class="error">*<?php echo $addressEr;?><br></span></input></td>
</tr>
<tr>
<td>&nbsp;</td>

<td><input type="submit" name="submit" value="Create"><a href=""></td>
<td><font color="#6CB5FF"></font>
<input type="submit" name="reset" value="Reset"><a href="faculty_reg.php"></td>
<td><font color="#6CB5FF"></font></td>


</table>
</td>
</form>


</tr>
</table><br><br><br><br><br><br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
			<br><br><br>
			<br><a href="faculty_login.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Faculty Login</b><br>
			<h2><a href="../index.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Home Page</a></h2>
			<h2><a href="../registration.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Back</a></h2><br>		
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