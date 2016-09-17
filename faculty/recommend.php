<?php
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header("location:faculty_login.php");
} else {
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");
	$bid=$_SESSION['Bid'];

	$result = mysql_query("SELECT * FROM book WHERE Bid='$bid'");
	$row = mysql_fetch_array($result);

	$bname=$row['Bname'];
	$result2 = mysql_query("INSERT INTO bookrecommend(Bid,recommend,Bname) VALUES('$bid','yes','$bname')");

	header("location:blog.php");
}
?>