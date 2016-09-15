
<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("Location:faculty_login.php");
} else 
{
?>
<html>
<head>
	<title>View Book</title>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" />
	
	<p id="layoutdims"><marquee>Welcome to Online Library Management System</marquee></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<br><br><br>
				
				<?php
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");
	$mid=$_SESSION['mid'];
	$result=mysql_query("SELECT * FROM book WHERE Bid='$_GET[bid]'");
	$available=$bid=$bname="";
	while($row=mysql_fetch_assoc($result))
	{
	$available=$row['Availability'];
	$bid=$row['Bid'];
	$bname=$row['Bname'];
	}
	$mid=$_SESSION['mid'];
	$query=mysql_query("SELECT * FROM facultydetails WHERE facultyNo='$mid'");
	while($row=mysql_fetch_assoc($query))
	{
		$mid=$row['facultyNo'];
		$mname=$row['name'];
	
	}
	//check book availability and no of books issued by member
	$query2=mysql_query("SELECT * FROM facultydetails WHERE facultyNo='$mid'");
	while($row=mysql_fetch_assoc($query2))
	{
		$book1=$row['Book1'];
		$book2=$row['Book2'];
	}
	if($available=='no')
	{
		echo"Book not available";
	}
	
	else if($book1!=NULL && $book2!=NULL)
	{
		echo"Cannot request more than 2 books";
	}
    else			   
	{
		$books=$row['noOfBooks'];
		$books-=1;
	$sql="INSERT INTO requestbook(Mid,Name,Bid,Bname,requestdate,noOfBooks) VALUES('$mid','$mname','$bid','$bname',now(),'$books')";
	$result=mysql_query($sql);
	if($result)
	{
		echo "Request sent";
		echo " Redirecting in 4 sec";
 		header('Refresh: 4; URL=issueBookByNumber.php');

	}
    }
?>
				<br><br><br><br><br><br>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>
					<a href="faculty.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
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
<?php
}
?>