<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","faculty");
	if (!$conn) 
	{
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	if(isset($_POST['Submit']))
	{
		$name = mysql_real_escape_string($_POST['name']);
		$password = mysql_real_escape_string($_POST['password']);
		$department = mysql_real_escape_string($_POST['department']);
		$year = mysql_real_escape_string($_POST['year']);
		$email = mysql_real_escape_string($_POST['email']);
		$faculty_id = mysql_real_escape_string($_POST['fno']);
		$contact = mysql_real_escape_string($_POST['contact']);
		$address = mysql_real_escape_string($_POST['address']);
		$gender = mysql_real_escape_string($_POST['gender']);
		$password=md5($password);
		$sql = "INSERT INTO faculty(name,password,department,year,email,faculty_id,contact,address,gender) VALUES('$name','$password','$department','$year','$email','$faculty_id','$contact','$address','$gender')";
		if(mysqli_query($conn,$sql))
		{
			echo "Successful";
			header("location:index.php");
		}
		else
			echo "Error".mysqli_error($conn);
			
	}
	
?>