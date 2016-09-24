
<?php 
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
} else {
	?><!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<link rel="stylesheet" type="text/css" href="screenf.css">


<style>
	#myInput {
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>

</head>


<body>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

		<div id="header">
			<img src="logo.png" name="logo" alt="logo" style="width: 100%; height: 150px;">
			<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
		</div>

	<div class="colmask threecol">
		<div class="colmid">
			<div class="colleft">
				<div class="col1">
					<br><br><br>
				
	<?php
		$server = "localhost"; 
		$user = "root";
 		$password = "";
 		$database = "library"; 
 		mysql_connect($server,$user,$password) or die ("Connection Fails"); 
 		mysql_select_db($database) or die ("Database Not Found");
 		$data = mysql_query("SELECT * FROM book"); 
 		
   		echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by book name..'>
   			<table id='myTable' class='tab1' border='1'> 
   				<caption>Book Details</caption>
 			  <th>Book ID </th> 
 			  <th>Book Name </th> 
 			  <th>Subject </th> 
  			  <th>Author </th> 
 			  <th>Availability </th>
 		  	  <th>Action </th>";
 
 
 while ($r=mysql_fetch_array($data))
 		{ 
 			echo "<tr>
 			<td>$r[Bid]</td> 
 			<td>$r[Bname]</td>
 			<td>$r[Subject]</td> 
 			<td>$r[Author]</td>
 			<td>$r[Availability]</td>
   			 <td><a href='requestbook.php?bid=$r[Bid]'>Request</a></td> 
 			</tr>";
   
 }
 echo "</table>"; 
 ?>
			
			<br><br><br><br><br><br>
				
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
					<!-- right side content -->									
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
<?php } ?>