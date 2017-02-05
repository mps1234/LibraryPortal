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
<title>Edit Details</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
	<style>
	.error{color:red;}
	</style>
</head>
<body>
<div id="header">
	<img src="logo.png" name="logo" style="width:100%" />
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
	$nameEr=$passwordEr=$addressEr=$emailEr=$branchEr="";
	$name=$password=$branch=$email="";
	$contact_no=$year=$address="";
	$contact_noEr=$yearEr="";

if(isset($_POST["submit"])){

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['branch']) && !empty($_POST['year'])&& !empty($_POST['contactno']) && !empty($_POST['address'])) 
{
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$branch=$_POST['branch'];
	$year=$_POST['year'];
	$contact_no=$_POST['contactno'];
	$address=$_POST['address'];
	function input($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
	
		if(empty($_POST["name"]))
		{
			$nameEr="Name Required";
		}
		else
		{
			$name=input($_POST['name']);
			
			if (!preg_match("/^[a-zA-Z ]*$/",$name))
			{
			    $nameEr = "Only letters and white space allowed"; 
			}
		}
		if(empty($_POST["branch"]))
		{
			$branchEr="Branch Required";
	
		}
		else
		{
			$branch=input($_POST['branch']);
		}
		if(empty($_POST["year"]))
		{
			$yearEr="Year Required";
		}
		else
		{
			$year=input($_POST['year']);
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
			$address=input($_POST['address']);
			
			
		}
		if(empty($_POST["contactno"]))
		{
			$contact_noEr="Contact Required";
		}
		else
		{
			$contact_no=input($_POST['contactno']);
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
			$email=input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
     			$emailEr = "Invalid email format"; 
    		}
		}
		
		if($nameEr==""&&$addressEr==""&&$emailEr==""&&$branchEr==""&&$contact_noEr==""&&$yearEr=="")
		{
	
			$query=mysqli_query($con,"UPDATE member SET name = '$name', email = '$email',  branch= '$branch', year = '$year', contactNo = '$contact', address = '$address' WHERE Mid = '$mid'");
				$_SESSION['sess_user_s']=$name;
			    header("Location:student_details.php");	
		}

}

}
	

	

$result = mysqli_query($con,"SELECT * FROM member WHERE Mid='".$mid."'");
while($row = mysqli_fetch_array($result))
{
 
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table id="student" style="width: 300; border:0; align:center;">
				<tr>
<td><b>Name:</b></td>
<td ><input name="name" type="text" class="textInput" value="<?php echo $row['Name'];?>" required></td>
<td><span class="error">*<?php echo $nameEr;?></span></td>
</tr>
<tr>
<td ><b>Email:</b></td>
<td ><input name="email" type="text" class="textInput"  value="<?php echo $row['Email'];?>" required></td>
<td><span class="error">*<?php echo $emailEr;?></span></td>
</tr>

<tr>
<td><b>Branch:</b></td>
<td><select class="textInput" name="branch">
	
    <option value="IT">IT</option>
    <option value="CS">CS</option>
    <option value="ME">ME</option>
    <option value="EN">EN</option>
    <option value="EC">EC</option>
    
    
    </select></td>
    <td><span class="error">*<?php echo $branchEr;?></span></td>
</tr>
<tr>
<td><b>Year:</b></td>
<td><select class="textInput"  name="year">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select></td>
<td><span class="error">*<?php echo $yearEr;?></span></td>
</tr>
<tr>
<td ><b>Contact no:</b></td>
<td ><input name="contactno" class="textInput" type="tel" value="<?php echo $row['ContactNo'];?>" required></td>
<td><span class="error">*<?php echo $contact_noEr; ?></span></td>
</tr>
<tr>
<td ><b>Address:</b></td>
<td><input name="address" type="text" class="textInput" value="<?php echo $row['Address'];?>" required></td>
<td> <span class="error">*<?php echo $addressEr;?><br></span></input></td>
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
					<a href="student_details.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
					<a href="student.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>

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