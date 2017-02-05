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
<html>
<head>
	<title>View Book</title>
	<link rel="stylesheet" type="text/css" href="screen.css" >	
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" />
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<br><br><br>
	<?php
	
	$con=mysqli_connect("localhost","root","","library");
	$mid=$_SESSION['mid'];
	$result=mysqli_query($con,"SELECT * FROM book where Bid='$_GET[bid]'");
	while($row=mysqli_fetch_assoc($result))
		{
      		$available=$row['Availability'];
	    	$bid=$row['Bid'];
		    $bname=$row['Bname'];
		}
	$mid=$_SESSION['mid'];
	$query=mysqli_query($con,"select * from member where Mid='$mid'");
	while($row=mysqli_fetch_assoc($query))
		{
			$mid=$row['Mid'];
			$mname=$row['Name'];
		
		}
	//check book availability and no of books issued by student
	$query2=mysqli_query($con,"select * from member where Mid='$mid'");
	while($row=mysqli_fetch_assoc($query2))
		{
			$book1=$row['Book1'];
			$book2=$row['Book2'];
		}
	if($available=='no')
		{
			echo"Book not available";
		}
	elseif($book1!=NULL && $book2!=NULL)
		{
			echo"Cannot request more than 2 books";
		}
    else			   
	{
		$sql="INSERT INTO requestbook(Mid,Name,Bid,Bname,requestdate) VALUES('$mid','$mname','$bid','$bname',now())";
		$result=mysqli_query($con,$sql);
			if($result)
				{
					echo "Request sent";
					header("Refresh: 2; url=studentViewBook.php");
				}
	}
?>
				<br><br><br><br><br><br>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>
					<a href="student.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
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
<?php
}
?>