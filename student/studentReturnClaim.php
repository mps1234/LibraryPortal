<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:../faculty/faculty.php");
}
else if(isset($_SESSION["sess_user_a"])){
	header("location:../admin.php");
}
else if(!isset($_SESSION["sess_user_s"])){
	header("location:student_login.php");
}
else
{ 
?>
<?php
	
	$con=mysqli_connect("localhost","root","","library");
	$issue_id=$_GET['Issue_id'];
	$mid=$_SESSION['mid'];
	$result=mysqli_query($con,"SELECT * FROM issuebook where Issue_id='$issue_id'");
	while($row=mysqli_fetch_assoc($result))
		{
		//insert into returnclaim table
			 $issue_id=$row['Issue_id'];
			 $mid=$row['Mid'];
			 $name=$row['Name'];
			 $bid=$row['Bid'];
			 $bname=$row['Bname'];
			 $validreturndate=$row['validreturndate'];
		}
	 $result=mysqli_query($con,"Insert into claimreturn(Issue_id,Mid,Name,Bid,Bname,validreturndate,returnclaim_date)
	 values('$issue_id','$mid','$name','$bid','$bname','$validreturndate',now())");
	 header ('Location:student.php'); 
?>
<?php
}
?>  
			




