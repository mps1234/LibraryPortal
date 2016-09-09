<!DOCTYPE html>
<html>
<head>
	<title>Admin Register</title>
	
	
	<link rel="stylesheet" type="text/css" href="screen.css"/>
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" style="width: 100%; height: 150px;"/>
	
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				
				<br><br><br><br>
				<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<b>Enter library code:<b>
				<input name="code" type="password"><br><br>
				<input type="submit" name="submit" value="Submit">
				
				</form>

				<?php
					if(isset($_POST["submit"]))
					{
						$code=$_POST['code'];
						$con=mysql_connect('localhost','root','') or die(mysql_error());
						mysql_select_db('library') or die("cannot select DB");
						
						$query=mysql_query("SELECT * FROM library_code");
						while($row=mysql_fetch_assoc($query))
						{
							$dbcode=$row['code'];
						}
						if($code == $dbcode)
						{
							header("Location: admin_reg.php");
						}
						else
						{
							echo"Enter valid code";
						}
					}
					
				
				?>
				<br><br><br><br><br>
				
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
