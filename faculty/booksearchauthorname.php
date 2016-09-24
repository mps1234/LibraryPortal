<?php 
session_start();
if(isset($_SESSION["sess_user_s"])){
	header("location:../student/student.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user"])){
	header("location:faculty_login.php");
}
else
{ ?>
<html>
<link rel="stylesheet" type="text/css" href="screenf.css" >
<style>
.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 28px;
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
	<img src="banner.png" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library1.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library2.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<img src="library3.jpg" name="logo"  class="mySlides" style="width: 100%; height: 250px;"/>
	<script>
	var myIndex = 0;
	carousel();

	function carousel()
	{
    	var i;
    	var x = document.getElementsByClassName("mySlides");
    	for (i = 0; i < x.length; i++)
    	{
    		x[i].style.display = "none";
    	}
    	myIndex++;
    	if (myIndex > x.length)
    	{myIndex = 1}
    	x[myIndex-1].style.display = "block";
    	setTimeout(carousel, 4000); 
	}
</script>

<div style="border:1px solid black;">
<h2><a href="../logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
<h2><a href="faculty.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Back</a></h2><br></div>
<form action="" method="post" class="form"><pre>
Author Name :<input type="text" name="AuthorName" placeholder="Author Name">	<button type="text" name="submit">Submit</button><br><br>
<?php
if(isset($_POST["submit"]))
{
	if(!empty($_POST['AuthorName']))
	{
		$authorname=$_POST['AuthorName'];
		$con=mysqli_connect("localhost","root","","library");
		$query=mysqli_query($con,"SELECT * FROM book WHERE Author='".$authorname."'");
		$numrows=mysqli_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_array($query))
			{
				$dbauthorname=$row['Author'];
				if(strcasecmp($dbauthorname,$authorname)==0)
				{
				echo "Availability ".$row['Availability'];

				}
			}
		}
		else
		{
			echo "<p class='alert' style='text-align:center;'>
  			<span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
  			<strong>No Book</strong></p>";
		}
	}
	else
	{
		echo "All Fields Compulsory";
	}
}
?>
<?php } ?>
</body>
</html>

