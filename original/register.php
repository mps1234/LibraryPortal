<html>
<style>
.error
{
	color: white;
}
.back
{
	height: 15%;
	color:white;
	background-color: blue;
}
.line
{
	border-right:medium #000000 solid; 
	height:60%;
	margin-right:50%;
}
.sper
{
	display: inline-block;
}
</style>
<body>
	<pre>
	<div class="back">
		<h1 style="text-align:center">Register Form</h1>
	</div>
		<?php 
		$nameEr=$genderEr=$passwordEr=$addressEr=$emailEr=$departmentEr="";
		$name=$password=$department=$gender=$email="";
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
				$name=input($_POST['name']);
				if (!preg_match("/^[a-zA-Z ]*$/",$name))
				{
				    $nameErr = "Only letters and white space allowed"; 
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
				$addressEr="City Required";
			}
			else
			{
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
			if(empty($_POST["gender"]))
			{
				$genderEr="Any One";
			}
			else
			{
				$gender=$_POST['gender'];
			}
			if(empty($_POST["fno"]))
			{
				$faculty_noEr="Enter Faculty Number";
			}
			else
			{
				$faculty_no=$_POST['fno'];
			}
			if(empty($_POST["contact"]))
			{
				$contact_noEr="Required Field";
			}
			else
			{
				$contact_no=$_POST['contact'];
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
		}
		function input($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		?>
		<form method="post" action="database.php">
<div class="sper">
<p><span class="error">* required field</span></p>
Name :<br><input type="text" name="name" placeholder="Faculty Name"><span class="error">*<?php echo $nameEr;?></span>
Password :<br><input type="password" name="password" placeholder="Password"><span class="error">*<?php echo $passwordEr;?></span>
Department :<br><input type="text" name="department" Placeholder="Department"><span class="error">*<?php echo $departmentEr;?></span>
Year :<br><input type="number" name="year" placeholder="Year"><span class="error">*<?php echo $yearEr;?><br></span>
Email :<br><input type="text" name="email"placeholder="Email ID"><span class="error">*<?php echo $emailEr;?></span>
Faculty ID:<br><input type="number" name="fno" placeholder="Faculty Id "><span class="error">*<?php echo $student_noEr;?></span>
Contact Number :<br><input type="number" name="contact" placeholder="Contact Number "><span class="error">*<?php echo $contact_noEr; ?></span>
Address:<br><input type="text" name="address"placeholder="Address"><span class="error">*<?php echo $addressEr;?><br></span>
<b>Gender</b><br><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="female">Female<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male<span class="error">*<?php echo $genderEr; ?></span>
<br><a href="demo.php"><input type="Submit" name="Submit">
</a>
</div>
</form>
</div>
</body>
</html
