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
<?php

	
	$con=mysqli_connect("localhost","root","","library");
	$claim_return_id=$_GET['claim_return_id'];
	$result=mysqli_query($con,"SELECT * FROM claimreturn where claim_return_id='$claim_return_id'");
	
	while ($row=mysqli_fetch_array($result))
		{
			$issue_id=$row['Issue_id'];
			$mid=$row['Mid'];
			$name=$row['Name'];
			$bid=$row['Bid'];
			$bname=$row['Bname'];
			$validreturndate=$row['validreturndate'];
			$validreturndate1=new DateTime($row['validreturndate']);
			$returndate=new DateTime(date('Y-m-d'));
			$diff=date_diff($returndate,$validreturndate1);
			$days=$diff->d;
	//insert requestclaim record into return table
			$sql=mysqli_query($con,"INSERT INTO returnbook(Issue_id,claim_return_id,Mid,Name,Bid,Bname,validreturndate,Return_date,diff)
	   		VALUES('$issue_id','$claim_return_id','$mid','$name','$bid','$bname','$validreturndate',now(),'$days')");
     
			$result=mysqli_query($con,$sql);
	
     }
	 
	$sql2=mysqli_query($con,"update member set Book1=NULL where Mid='$mid'");
	$sql3=mysqli_query($con,"DELETE FROM claimreturn WHERE claim_return_id='$claim_return_id'"); 
	$sql4=mysqli_query($con,"update book set Availability='yes' where Bid='$bid'");
//insert into return store

	$result=mysql_query("SELECT * FROM returnbook where claim_return_id='$claim_return_id'");
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
	
	$sql=mysqli_query($con,"INSERT INTO returnstore(Return_id,Issue_id,Bid,Bname,Mid,Name,validreturndate,Return_date,diff)
	   VALUES('$return_id','$issue_id','$bid','$bname','$mid','$name','$validreturndate',now(),'$days')");
     
	$result=mysqli_query($con,$sql);
	
     }


//delete returnclaim record	 and return record
$sql1=mysqli_query($con,"DELETE FROM claimreturn WHERE claim_return_id='$claim_return_id'"); 
    $result1=mysqli_query($con,$sql1);

$sql1=mysqli_query($con,"DELETE FROM returnbook WHERE claim_return_id='$claim_return_id'"); 
    $result1=mysqli_query($con,$sql1);

$sql1=mysqli_query($con,"DELETE FROM issuebook WHERE Issue_id='$issue_id'"); 
    $result1=mysqli_query($con,$sql1);
	
	//create fine record


	header ('location:ADreturn_view.php'); 

}

?>