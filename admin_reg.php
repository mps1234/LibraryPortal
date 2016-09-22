<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:admin_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin registration</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
		<style>
	.error {color: #FF0000;}
	.alert2 {
    padding: 20px;
    background-color: red;
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
</head>
<body>
		<?php 
		$nameEr = $passwordEr =$addressEr=$emailEr=$contact_noEr="";
		$name=$password=$email="";
		$contact_no=$address="";
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if(empty($_POST["name"]))
			{
				$nameEr="Name Required";
			}
			else
			{
				$name=$_POST['name'];
				if (!preg_match("/^[a-zA-Z ]*$/",$name))
				{
				    $nameEr = "Only letters and white space allowed"; 
				}
			}
			
			if(empty($_POST["address"]))
			{
				$addressEr="address Required";
			}
			else
			{
				$address=$_POST['address'];
			}


			if(empty($_POST["password"]))
			{
				$passwordEr="Password Required";
			}
			elseif(strlen($_POST["password"])<6)
			{
				$passwordEr="password should be atleast 6 characters long"; 
			}
			elseif(strlen($_POST["password"])>15){
				$passwordEr="password should not be greater than 15 char";
			}
			else
			{
				$password=$_POST['password'];
			}
			
			
			/*if(empty($_POST['contact']))
			{
				$contact_noEr="Required Field";
			}
			
			else
			{   
				$contact_no=$_POST['contact'];
			}*/

if(empty($_POST["contact"]))
			{
				$contact_noEr="Required Field";
			}
			else
			{   
				$contact_no=$_POST['contact'];
				if(strlen($contact_no)>10)
				$contact_noEr="contact number should be valid";
			    elseif(strlen($contact_no)<10)
			    $contact_noEr="contact number should be valid";
			
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
			if($nameEr==""&&$passwordEr==""&&$addressEr==""&&$emailEr==""&&$contact_noEr=="")
			{
				$password=md5($password);
				
				
	$con=mysqli_connect("localhost","root","","library");
				$query=mysqli_query($con,"SELECT * FROM admin WHERE Email='".$email."'");
				$numrows=mysqli_num_rows($query);
				if($numrows==0)
				{
					$sql = "INSERT INTO admin(Name,Email,Password,contactno,Address) VALUES('$name','$email','$password','$contact_no','$address')";
					$result=mysqli_query($con,$sql);
					if($result)
					{	
					echo "Account Successfully Created";
					header("Location: admin.php");
					}
					else
					{
					echo "Failure!";
					}
				}
				else {
					echo "<div  class='alert2' style='text-align:center;position:absolute;margin-left:40%;'>
  			<span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span><strong> That email already exists! Please try again with another.</strong> 
				</div>";
					 }
}
}	
		
		?>
<div id="header">
	 <img src="logo.png" name="logo"  style="width:100%">
	 <p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h1 style="text-align: center; color: #369;">ADMIN REGISTRATION</h1><br><br><br><br>
		      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table  style="width: 300; border:0; align:center;">
				<p><span class="error">* required field</span></p>
				
				<tr>
						<td>Name :</td>
						<td><input type="text" name="name" class="textInput" value="<?php echo $name;?>"></td>
						<td><span class="error">*<?php echo $nameEr;?></span> </td>
				</tr>

				<tr>
						<td>E-mail :</td>
						<td><input type="email" name="email" class="textInput" value="<?php echo $email;?>"></td>
						<td><span class="error">*<?php echo $emailEr;?></span></td>
				</tr>

				<tr>
						<td>Password :</td>
						<td><input type="password" name="password" class="textInput" ></td>
						<td><span class="error">*<?php echo $passwordEr;?></span></td>
				</tr>

				
				<tr>
						<td>Contact No. :</td>
						<td><input type="tel" name="contact" class="textInput" value="<?php echo $contact_no;?>"></td>
						<td><span class="error">*<?php echo $contact_noEr; ?></span></td>
				</tr>

				<tr>
						<td>Address :</td>
						<td><textarea rows="4" cols="22" name="address"></textarea></td>
						<td><span class="error">*<?php echo $addressEr;?><br></span></td>
							
							</tr>

				<tr>	
						<td><input type="submit" name="submit" value="Create"><a href=""></td>
						<td><input type="submit" name="reset" value="Reset"><a href=""></td>
				</tr>
						<br><br>
			</table>
							<br><br>

		</form>
				<br><br>
				<br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><a href="admin_login.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Admin Login</b><br>

					<br><a href="check.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b><br>
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