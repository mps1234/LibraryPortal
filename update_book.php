<!-- To update the book details -->
<?php 
	$server = "localhost"; 
	$user = "root";
 	$password = "";
 	$database = "library"; 
	$conn=mysql_connect($server,$user,$password) or die ("Connection Fails"); 
	mysql_select_db($database) or die ("Database Not Found");  
	$query=mysql_query("UPDATE book SET Bid = '$_POST[bid]', Bname = '$_POST[bname]', Subject = '$_POST[subject]', Author = '$_POST[author]', Availability = '$_POST[availability]'  WHERE Bid = '$_POST[bid]'"); 


if (mysql_query($conn, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysql_error($conn);
}
	header ('location:ADview_book.php'); 
?>
