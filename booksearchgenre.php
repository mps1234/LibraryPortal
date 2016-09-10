<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
}else{
?>
<html>
<link rel="stylesheet" type="text/css" href="screen.css" media="screen"/>
<article>
	<header class="dashboard">
		<font size="18" color="white">Search By Genre Name</font>
	</header>
</article>
<div class="vertical">
<h2><a href="logout.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Logout</a></h2><br>
<h2><a href="faculty.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; ">Home</a></h2><br></div>
<body>
<pre>
<form action="" method="post" class="form"><pre>
Genre :<input type="text" name="Genre" placeholder="Genre">
<button type="text" name="submit">Submit</button>
<?php
if(isset($_POST["submit"]))
{
	if(!empty($_POST['Genre']))
	{
		$genre=$_POST['Genre'];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('libraryportal')or die('cannot create db');
		$query=mysql_query("SELECT * FROM book WHERE Subject='".$genre."'");
		$numrows=mysql_num_rows($query);
		if($numrows!=0)
		{
			while(mysql_fetch_assoc($numrows))
			{
				$dbgenre=$row['Subject'];
				if($dbgenre==$genre)
				{
				echo $row['Availability'];
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

