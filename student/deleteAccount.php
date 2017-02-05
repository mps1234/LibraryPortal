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
	$server = "localhost"; 
	$user = "root";
 	$password = "";
 	$database = "library"; 
 	$con=mysqli_connect($server,$user,$password,$database) or die ("Connection Fails"); 
 	
	$name=$_SESSION['sess_user_s'];
	$result=mysqli_query($con,"SELECT Book1,Book2 FROM member WHERE Name='".$name."'");
    $row = mysqli_fetch_array($result);	
	$book1=$row['Book1'];
	$book2=$row['Book2'];
	if($book1==NULL&&$book2==NULL)
	{
		
		mysqli_query($con,"DELETE FROM member WHERE Name='".$name."'");
        
	    $_SESSION['count']=0;
	}
    else{
         $_SESSION['count']=1;
 		$result1=mysqli_query($con,"SELECT * FROM member WHERE Name='".$name."'");
		$row = mysqli_fetch_array($result1);
		
		$sno=$row['Mid'];
		require 'PHPmail/PHPMailerAutoload.php';
		require 'PHPmail/class.phpmailer.php'; // path to the PHPMailer class
		require 'PHPmail/class.smtp.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;    

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'Smtp.gmail.com;Smtp.live.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'nakshatrapradhan2013@gmail.com';                 // SMTP username
		$mail->Password = 'Na1@trapra';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );  

		$mail->setFrom('nakshatrapradhan2013@gmail.com', 'nakshatra');    // Add a recipient
		$mail->addAddress('mayur.pathak52@gmail.com');  
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Subject';
		$mail->Body    = "student is trying to deactivate his account without returning books...Details are----name is".$name."student number is".$sno;
		$mail->AltBody = 'illegal deactivating account';
	
	}
 header("location:delAccountAfter.php");	
   ?>
<?php
}
?>