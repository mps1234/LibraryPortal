<!DOCTYPE html>
<html>
<head>
	<title>Admin Fine</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	
</head>

<body>

<div id="header">
	<img src="logo.png" name="logo" alt="logo" style="width: 100%; height: 150px;">
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>


<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1" style="overflow-x:auto;">
				<!-- Column 1 start -->
				<br>

			<?php
 	$server = "localhost"; 
	$user = "root";
	$password = "";
	$database = "library"; 
	mysql_connect($server,$user,$password)
	or die ("Connection Fails"); 
	mysql_select_db($database) or die ("Database Not Found");
	echo "<table border='1' align='center'> 
 <th>Issue_id </th>
 <th>Return_id </th>
 <th>Bid</th> 
 <th>Mid</th>
 <th>Name</th>
 <th>Issue_date</th>
 <th>Return_date</th>
 <th>diff</th>
 <th>Amount</th>";


$result=mysql_query("SELECT * FROM returnstore where diff>0");

$no=1;
	
	while ($row=mysql_fetch_array($result))
	{
    $return_id=$row['Return_id'];
	$issue_id=$row['Issue_id'];
	$mid=$row['Mid'];
	$name=$row['Name'];
	$bid=$row['Bid'];
	$bname=$row['Bname'];
	$validreturndate=$row['validreturndate'];
    $returndate=$row['Return_date'];
	$diff=$row['diff'];
	$fine=$diff*20;


 

echo" <tr>
<td>$issue_id</td>
<td>$return_id</td>
<td>$bid</td>
<td>$mid</td>
<td>$name</td>
<td>$validreturndate</td>
<td>$returndate</td>
<td>$diff</td>
<td>$fine</td>
</tr>"
;
}
	
?>

				
				<!-- Column 1 end -->
			</div>
			<div class="col2" style="float:left;">
				<!-- Column 2 start -->
					
					<a href="admin.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Home</b></a><br><br>
				
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
