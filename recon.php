<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
} else {
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />

<title>Book Recommendation And Research Paper</title>
</head>

<body style="background-color:#E6E6FA">
<div id="header">
	<img src="banner.png" name="logo"  class="mySlides" style="width: 100%; height: 250px;">
	<div style="background-color:#3377FF;text-align:center;">
	<font size="14" color="white">Welcome <?php echo $_SESSION['sess_user']; ?></font><hr style="border:1px solid black;"></div>
<ul>
  <li><a href="faculty.php">Home</a></li>
  <li><a href="faculty_details.php">Details</a></li>
   <li><a href="logout.php">Logout</a></li>
</ul>
<div style="float:left;margin-left:5%;width:25%;height:60%;border:1px solid black;overflow:scroll;margin-top:1%;background-color:white;">

<?php
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");
	$_SESSION['count']=0;
	$avail="yes";

	$result = mysql_query("SELECT * FROM bookrecommend WHERE recommend='".$avail."'");
	while($row = mysql_fetch_array($result))
	{
?>	
	<?php if($_SESSION['count']==0) { ?>
	<table width="160" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="white">
	<tr>
	<th>Book Name</th>
	<th>Book ID</th>
	</tr>
	<?php } ?>
	<tr>
	<td><?php echo $row['Bname'];?></td>
	<td><?php echo $row['Bid'];?></td>
	</tr>
	<?php $_SESSION['count']+=1;
	?>
	</table>
<?php

 }
 if($_SESSION['count']==0)
 {
 	echo "No Book In Database";
 }
 ?>
 </div>
 <div style="float:right;margin-right:5%;width:60%;height:60%;border:1px solid black;overflow:scroll;margin-top:1%;background-color:white;">
 	<?php
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");

	$result = mysql_query("SELECT * FROM upload");
	while($row = mysql_fetch_array($result))
	{
		
?>	<img src="<?php echo $row['link']; ?>"/>

	<?php } ?>

 </div>
</body>
</html>
<?php
}
?>