<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:student_login.php");
} else {
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screenf.css" media="screen" />

<title>Book Recommendation And Research Paper</title>
</head>

<body style="background-color:#E6E6FA">
<div id="header">
	<img src="banner.png" name="logo" style="width: 100%; height: 250px;">
	<div style="background-color:#3377FF;text-align:center;">
	<font size="14" color="white">Welcome <?php echo $_SESSION['sess_user']; ?></font><hr style="border:1px solid black;"></div>
<ul>
  <li><a href="../student/student.php">Home</a></li>
  <li><a href="../student/student_details.php">Details</a></li>
   <li><a href="../logout.php">Logout</a></li>
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
	
	<table width="270" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="white">
	<?php if($_SESSION['count']==0) { ?>
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
	mysql_select_db('library') or die("cannot select DB");

	$result = mysql_query("SELECT * FROM upload");
	while($row = mysql_fetch_array($result))
	{
		$target=$row['link'];
		$imageFileType = pathinfo($target,PATHINFO_EXTENSION);
		if($imageFileType=="pdf")
		{
			?>
			<object  width="100" height="100" data="http://localhost/Latest%20library/faculty/<?php echo $row['link'];?>"></object>
		<?php } ?>
<?php
if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
|| $imageFileType == "gif" )
 {
?>
	<img src="<?php echo $row['link'];?>">
	<?php } ?>
	<?php } ?>







 </div>
</body>
</html>
<?php
}
?>