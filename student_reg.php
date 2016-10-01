<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:../faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?><!DOCTYPE html>
<html>
<head>
	<title>student registration</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body>
		<?php 
		$nameEr = $passwordEr =$addressEr=$emailEr="";
		$name=$password=$email="";
		$student_no=$contact_no=$year=$address="";
		$contact_noEr=$student_noEr=$yearEr="";
		function input($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
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
				    $nameEr = "Only letters and white space allowed"; 
				}
			}
			$branch=$_POST['branch'];
			$year=$_POST['year'];
			
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
			elseif((strlen($_POST["password"]))<6) 
			{
                $passwordEr="password should be of min 6 characters";
			}
			elseif ((strlen($_POST["password"])>12))
			{
                $passwordEr="password should be of max 12 characters";
			}
			else
			{
				$password=md5($_POST['password']);
			}
			
			if(empty($_POST["sno"]))
			{
				$student_noEr="Enter student Number";
			}
			else
			{
				$student_no=$_POST['sno'];
				if(strlen($student_no)>7)
				$student_noEr="student number should be of 7 digits";
                elseif(strlen($student_no)<7)
			    $student_noEr="student number should be of 7 digits";			
			}
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
			if($nameEr==""&&$passwordEr==""&&$addressEr==""&&$emailEr==""&&$contact_noEr==""&&$student_noEr=="")
			{	
			$con=mysqli_connect('localhost','root','','library') or die(mysql_error());
			
			$query=mysqli_query($con,"SELECT * FROM member WHERE Mid='".$student_no."'");
			$query1=mysqli_query($con,"SELECT * FROM member WHERE Email='".$email."'");
			$numrows=mysqli_num_rows($query);
			$numrows1=mysqli_num_rows($query1);
			if($numrows==0)
			{  
		       if($numrows1==0)
			   {
		        $sql = "INSERT INTO member(Name,Password,Branch,Year,Email,Mid,ContactNo,Address) VALUES('$name','$password','$branch','$year','$email','$student_no','$contact_no','$address')";
				$result=mysqli_query($con,$sql);
				if($result)
				{	
				   echo "Account Successfully Created";
				   header("Location:student.php");
				}
				else
				{
				   echo "Failure!";
			   }}
			   else
			   {?>
		        
		
				<h3>email id already exists</h3>   
			   
			   <?php
			   }
			}
	        else 
	        {
		       echo "That student number already exists! Please try again with another.";
	        }
}
}	
		
		?>
<div id="header">
	 <img src="logo.png" name="logo" width="100%"/>
	 <p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h1 style="text-align: center; color: #369;">STUDENT REGISTRATION</h1><br><br><br><br>
		        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
				<p><span class="error">* required field</span></p>
				<tr>
				<tr>
								<td><b>Name :</b></td>
								<td><input type="text" name="name" class="textInput" value="<?php echo $name;?>"></td>
								<td><span class="error"> <?php echo $nameEr;?></span> </td>
							</tr>

							<tr>
								<td><b>Roll No. :</b></td>
								<td><input type="number" name="sno" class="textInput" value="<?php echo $student_no;?>"></td>
								<td><span class="error"> <?php echo $student_noEr;?></span></td>
							</tr>

							<tr>
								<td><b>E-mail :</b></td>
								<td><input type="text" name="email" class="textInput" value="<?php echo $email;?>"></td>
								<td><span class="error">*<?php echo $emailEr;?></span></td>
							</tr>

							<tr>
								<td><b>Password :</b></td>
								<td><input type="password" name="password" class="textInput" ></td>
								<td><span class="error">*<?php echo $passwordEr;?></span></td>
							</tr>

							<tr>
							<td><b>Branch :</b></td>
							<td><select name="branch" style="padding:8px;font-size:16px">
									<option value="IT">Information Technology</option>
									<option value="EC">Electrical</option>
									<option value="CS">Computer Science</option>
									<option value="CE">Civil</option>
									<option value="ME">Mechanical</option>
								</select></td>
							</tr>

							<tr>
							<td><b>Year :</b></td>
							<td><select name="year" style="padding:8px;font-size:16px">
									<option value="1">First year</option>
									<option value="2">Second year</option>
									<option value="3">Third year</option>
									<option value="4">Fourth year</option>
								</select></td>
							</tr>

							<tr>
								<td><b>Contact No. :</b></td>
								<td><input type="number" name="contact" class="textInput" value="<?php echo $contact;?>"></td>
								<td><span class="error">*<?php echo $contact_noEr; ?></span></td>
							</tr>

							<tr>
								<td><b>Address :</b></td>
								<td><textarea rows="4" cols="22" name="address"></textarea></td>
								<td><span class="error">*<?php echo $addressEr;?><br></span></td>
							
							</tr>
							
							

						<tr>	
						<td><input type="submit" name="submit" value="submit"><a href=""></td>
						<td><input type="reset"  name="reset" value="Reset"><a href=""></td>
						</tr>
						<br><br><br>
						</table>
							<br><br><br>

				</form>
				<br><br>
				<br><br><br><br><br><br><br>	
				
				
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>
					<a href="../registration.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
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