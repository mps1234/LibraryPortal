<!DOCTYPE html>
<html>
<head>
	<title>student registration</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" align="middle" />
	
	<p id="layoutdims"><marquee>Welcome to Online Library Management System</marquee></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
			
				
				<h1 align="center" > <font color="#369">FACULTY REGISTRATI0N</font></h1><br><br>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >


<tr>
<td width="78"><B>Name</B></td>
<td width="6">:</td>
<td width="294"><input name="name" type="text" placeholder="Name"></td>
</tr>
<tr>
<td width="78"><B>Faculty no</B></td>
<td width="6">:</td>
<td width="294"><input name="mid" type="text" placeholder="Faculty Number"></td>
</tr>
<tr>
<td width="78"><B>Email</B></td>
<td width="6">:</td>
<td width="294"><input name="email" type="email" placeholder="Email Address"></td>
</tr>
<tr>
<td><B>Password</B></td>
<td>:</td>
<td><input name="pass" type="password" placeholder="Password"></td>
</tr>
<tr>
<td><B>Department</B></td>
<td>:</td>
<td><input name="department" type="text" placeholder="Department"></td>
</tr>
<tr>
<td><B>Year</B></td>
<td>:</td>
<td><input name="year" type="text" placeholder="Year"></td>
</tr>
<tr>
<td width="78"><B>Contact no</B></td>
<td width="6">:</td>
<td width="294"><input name="contactno" type="tel" placeholder="Contact Number"></td>
</tr>
<tr>
<td width="78"><B>Address</B></td>
<td width="6">:</td>
<td width="294"><textarea rows="4" cols="22" name="address" placeholder="Address" ></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>

<td><input type="submit" name="submit" value="Create"><a href=""></td>
<td><font color="#6CB5FF"></font>
<input type="submit" name="reset" value="Reset"><a href=""></td>
<td><font color="#6CB5FF"></font></td>


</table>
</td>
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['mid']) && !empty($_POST['email']) && !empty($_POST['department']) && !empty($_POST['year'])&& !empty($_POST['contactno']) && !empty($_POST['address'])) 
{
	$name=$_POST['name'];
	$mid=$_POST['mid'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$department=$_POST['department'];
	$year=$_POST['year'];
	$contact=$_POST['contactno'];
	$address=$_POST['address'];
	

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM facultydetails WHERE facultyNo='".$mid."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
		$sql="INSERT INTO facultydetails(name,facultyNo,email,password,department,year,contactNo,address) VALUES('$name','$mid','$email','$pass','$department','$year','$contact','$address')";

		$result=mysql_query($sql);
		if($result){
	
		echo "Account Successfully Created";
		header("Location: faculty_login.php");
		}
		else
		{
		echo "Failure!";
		}
	}
	else {
		echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>


</tr>
</table><br><br><br><br><br><br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					
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
