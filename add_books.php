<!DOCTYPE html>
<html>
<head>
	<title>Add books</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
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
				
				<h1 style="text-align: center; color: #369;"> ADD BOOKS</h1><br><br>
		<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table style="width: 300; border:0; align:center;">	
			

			<tr>
				<td>Book Id :</td>
				<td><input type="text" name="bid" class="textInput"></td>
			</tr>

			
			<tr>
				<td>Book name :</td>
				<td><input name="bname" type="text" class="textInput" ></td>
			</tr>

			<tr>
				<td>Subject :</td>
				<td><input name="subject" type="text" class="textInput" ></td>
			</tr>

			<tr>
				<td>Author :</td>
				<td><input name="author" type="text" class="textInput"></td>
			</tr>

			<tr>
				<td>Availability (Yes or No)</td>
				<td><input name="availability" type="text" class="textInput" ></td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="Add" value="Add"><a href=""></a>
					<input type="submit" name="Reset" value="Reset"><a href=""></a>
				</td>
			</tr>

		</table><br>	
</form><br><br><br>

<?php
if(isset($_POST["Add"])){

if(!empty($_POST['bname']) && !empty($_POST['bid']) ) 
	{
	$bname=$_POST['bname'];
	$subject=$_POST['subject'];
	$author=$_POST['author'];
	$availability=$_POST['availability'];
	$bid=$_POST['bid'];
	

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM book WHERE Bid='".$bid."'");
	$numrows=mysql_num_rows($query);
		if($numrows==0)
		{
			$sql="INSERT INTO book(Bid,Bname,Subject,Author,Availability) VALUES('$bid','$bname','$subject','$author','$availability')";

			$result=mysql_query($sql);


			if($result){
			echo "Book Successfully Added";
			} else {
			echo "Failure!";
			}

		} 
			
		else {
			echo "That book already exists! Please try again with another.";
		}

	} else {
	echo "All fields are required!";
}
}
?>
</table>
				
				
				
			</div>
			<div class="col2">
				<br><br>
				<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
				
			</div>
				<div class="col3">
					<div id="ads">
					
					<!-- for Right side content -->
					</div>
				
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
