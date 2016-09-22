<?php 
session_start();
if(isset($_SESSION["sess_user"])){
  header("location:faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_s"])){
  header("location:student/student.php");
}
else if(!isset($_SESSION["sess_user_a"])){
  header("location:admin_login.php");
}
else
{ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Book</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css"> 

<style>
	#myInput,#myInput2 {
  width: 80%;
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
<script>
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
				<div class="col1" style="overflow-x:auto;">
					<br><br><br>
				
	<?php

		$server = "localhost"; 
		$user = "root";
 		$password = "";
 		$database = "library"; 
 		$con=mysqli_connect($server,$user,$password,$database) or die ("Connection Fails"); 
 		
 		$data = mysqli_query($con,"SELECT * FROM book"); 

 		

   		echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by book name..'>

   			<input type='text' id='myInput2' onkeyup='myFunction2()' placeholder='Search by subject name..'>

   			<table id='myTable' class='tab1' border='1'> 
   				<caption>Book Details</caption>
 			  <th>Book ID </th> 
 			  <th>Book Name </th> 
 			  <th>Subject </th> 
  			<th>Author </th> 
        <th>No. of Books</th>
 			  <th>Availability </th>
 		  	<th>Action </th>";
 
 
 while ($r=mysqli_fetch_array($data))
 		{ 
 			echo "<tr>
 			<td>$r[Bid]</td> 
 			<td>$r[Bname]</td>
 			<td>$r[Subject]</td> 
 			<td>$r[Author]</td>
      <td>$r[No_of_books]</td>
 			<td>$r[Availability]</td>
   			<td><a href='book_edit.php?bid=$r[Bid]'>Edit</a> | <a href='delete_book.php?bid=$r[Bid]'>Delete</a></td> 
 			</tr>";
   
 }
 echo "</table>"; 
 ?>
			
			<br><br><br><br><br><br>
				
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>

					<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
				
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
<?php
}
?>