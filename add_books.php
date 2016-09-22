<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
	header("location:student/student.php");
}
else if(!isset($_SESSION["sess_user_a"])){
	header("location:admin_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add books</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	<link rel="stylesheet" type="text/css" href="screen5.css">
</head>
<style>
.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}
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
				<td>No. of Books :</td>
				<td><input name="noofbooks" type="number" class="textInput"></td>
			</tr>

			<tr>
				<td>Availability :</td>
				<td>
					<select name="availability">
    				<option value="yes">Yes</option>
    				<option value="no">No</option>
    				</select>
    			</td>
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
	$noofbooks=$_POST['noofbooks'];
	

	
	$con=mysqli_connect("localhost","root","","library");

	$query=mysqli_query($con,"SELECT * FROM book WHERE Bid='".$bid."'");
	$numrows=mysqli_num_rows($query);
		if($numrows==0)
		{
			$sql="INSERT INTO book(Bid,Bname,Subject,Author,No_of_books,Availability) VALUES('$bid','$bname','$subject','$author','$noofbooks','$availability')";

			$result=mysqli_query($con,$sql);


			if($result){
			echo "<div class='alert' style='text-align:center;'>
  <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
  <strong> Book Successfully Added</strong> 
</div>";
			} else {
			echo "Failure!";
			}

		} 
			
		else {
			echo "<div class='alert2' style='text-align:center;'>
  <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
  That book already exists! Please try again with another. 
</div>";
		}

	} else {
	echo "<div class='alert2' style='text-align:center;'>
  <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>  All fields are required! </div>";
}
}
?>
</table>
				
				
				
			</div>
			<div class="col2">
				<br><br>
				<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>

				<br><br>
				<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Back</b></a><br><br>
				
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
<?php } ?>
