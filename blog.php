<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
} else {
?>
<html>
<head>
<title>Book Recommendation And Research Paper</title>
</head>
<style>
ul {
    margin: 0;
    padding: 0;
    width: 15%;
    border:1px solid black;
    background-color: #FF8A33;
}
li a {
    display:block;
    color: #000;
    padding: 4% 9%;
    border:1px solid black;
 
}

li a:hover {
    background-color: #555;
    border-bottom:1px solid yellow;
    color: white;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 2%;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
<body>
<div style="background-color:#3377FF;text-align:center;">
	<font size="18" color="white">Welcome <?php echo $_SESSION['sess_user']; ?></font><hr style="border:1px solid black;"></div>
<ul>
  <li><a href="faculty.php">Home</a></li>
  <li><a href="faculty_details.php">Personal Details</a></li>
   <li><a href="logout.php">Logout</a></li>
</ul>
<h1>Available Books</h1>
<div style="float:left;width:45%;height:60%;border:1px solid black;margin:auto;overflow:scroll;margin-top:0%;">
<?php
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('libraryportal') or die("cannot select DB");
	$_SESSION['count']=0;
	$avail="yes";

	$result = mysql_query("SELECT * FROM book WHERE avail='".$avail."'");
	while($row = mysql_fetch_array($result))
	{
?>	
	<?php if($_SESSION['count']==0) { ?>
	<table>
	<tr>
	<th>Book Name</th>
	<th>Subject</th>
	<th>Author Name</th>
	</tr>
	<?php } ?>
	<tr>
	<td><?php echo $row['BName'];?></td>
	<td><?php echo $row['Subject'];?></td>
	<td><?php echo $row['Subject'];?></td>
	</tr>
	<td colspan="2" align="center">Edit Details</td>
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
 <div style="float:right;width:40%;height:8%;border:1px solid black;margin:auto;display:block;background-color:#f1f1f1">
<pre>
<form action="" method="post" class="form"><pre>
	Upload Link:<input type="text" name="Upload" placeholder="Links">	<button type="text" name="submit">Upload</button>
</div>
</body>
</html>
<?php
}
?>