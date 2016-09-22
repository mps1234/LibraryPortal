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
	
	$con=mysqli_connect("localhost","root","","library");
	
	$request_id=$_GET['request_id'];
	$result=mysqli_query($con,"SELECT * FROM requestbook where Request_id=$request_id");
	$row = mysqli_fetch_array($result);
	$request_id=$row['Request_id'];
    $mid=$row['Mid'];
	$name=$row['Name'];
	$bid=$row['Bid'];
	$bname=$row['Bname'];
	
	//insert request record into issue table
	$sql=mysqli_query($con,"INSERT INTO issuebook(Request_id,Mid,Name,Bid,Bname,Issue_date,validreturndate)
	   VALUES('$request_id','$mid','$name','$bid','$bname',now(),ADDDATE(now(),8))");
     
	$result=mysqli_query($con,$sql);
	
	$sql4=mysqli_query($con,"update book set Availability='no' where Bid='$bid'");
	
	$query=mysqli_query($con,"select * from member where Mid='$mid'");
	$book1="";
	while ($r=mysqli_fetch_array($query))
	{
		$book1=$r['Book1'];
	
	}
	
	
	
	if($book1==NULL)
	{
		$sql2=mysqli_query($con,"update member set Book1='$bid' where Mid='$mid'");
	}
	else
	{
		$sql3=mysqli_query($con,"update member set Book2='$bid' where Mid='$mid'");
	}
	
	
	
	//insert issue record into issuestore
	$sql=mysqli_query($con,"select * from issuebook where Request_id='$request_id'");
	
	while ($row=@mysqli_fetch_array($con,$sql))
	{
	$Issue_id=$row['Issue_id'];
    $mid=$row['Mid'];
	$name=$row['Name'];
	$bid=$row['Bid'];
	$bname=$row['Bname'];
	$sql=mysqli_query($con,"INSERT INTO issuestore(Issue_id,Mid,Name,Bid,Bname,Issue_date,validreturndate)
	   VALUES('$Issue_id','$mid','$name','$bid','$bname',now(),ADDDATE(now(),-8))");
	
	echo "Book issued successfully.<br>";
	echo "your book id is ".$bid;
	echo " your issue id is ".$Issue_id;
}
	
	
	//delete request record
	$sql1=mysqli_query($con,"DELETE FROM requestbook WHERE Request_id='$request_id'"); 
    $result1=mysqli_query($con,$sql1);
    
	header('refresh:10;url=admin.php');

}
?>

