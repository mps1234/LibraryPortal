<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
}else{
?>
<html>
<link rel="stylesheet" type="text/css" href="screenf.css" media="screen"/>
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

<div class="vertical">
<h2><a href="../logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
<h2><a href="faculty.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Back</a></h2><br></div>

<pre>
<form action="" method="post" class="form"><pre>
Genre :<input type="text" name="Genre" placeholder="Genre">	<button type="text" name="submit">Submit</button>
<?php
if(isset($_POST["submit"]))
{
	if(!empty($_POST['Genre']))
	{
		$genre=$_POST['Genre'];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('library')or die('cannot create db');
		$query=mysql_query("SELECT * FROM book WHERE Subject='".$genre."'");
		$numrows=mysql_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysql_fetch_array($query))
			{
				$dbgenre=$row['Subject'];
				if(strcasecmp($dbgenre,$genre)==0)
				{
				echo "Availability ".$row['Availability'];
				}
			}
		}
		else
		{
			echo "No Book Exist";
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

