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
{ 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screenf.css">

<title>Book Recommendation And Research Paper</title>
</head>

<body style="background-color:#E6E6FA">
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



<div style="background-color:#3377FF;text-align:center;">
	<font size="14" color="white">Welcome <?php echo $_SESSION['sess_user']; ?></font><hr style="border:1px solid black;"></div>
<ul>
  <li><a href="faculty.php">Back</a></li>
  <li><a href="faculty_details.php">Details</a></li>
   <li><a href="../logout.php">Logout</a></li>
</ul>
<h1 style="color:#000;">Available Books</h1>
<div style="float:left;width:45%;height:60%;border:1px solid black;overflow:scroll;margin-top:2%;background-color:#F4A460;">

<?php
	$con=mysqli_connect("localhost","root","","library") or die(mysqli_error());
	$_SESSION['count']=0;
	$avail="yes";

	$result = mysqli_query($con,"SELECT * FROM book WHERE Availability='".$avail."'");
	while($row = mysqli_fetch_array($result))
	{ $_SESSION['Bid']=$row['Bid'];
?>	
	<?php if($_SESSION['count']==0) { ?>
	<table>
	<tr>
	<th>Book Name</th>
	<th>Subject</th>
	<th>Author Name</th>
	<th>Link</th>
	</tr>
	<?php } ?>
	<tr>
	<td><?php echo $row['Bname'];?></td>
	<td><?php echo $row['Subject'];?></td>
	<td><?php echo $row['Subject'];?></td>
	<td><a href="recommend.php">Recommend</a></td>
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
 <div style="float:right;width:40%;height:15%;background-color:#C0C0C0">
<pre>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" size="50" />	<input type="submit" value="Upload" />
	</form>


</div>
</body>
</html>
<?php
}
?>