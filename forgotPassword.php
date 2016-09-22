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
<html>
<head>
	<title>FORGOT PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="screen.css" />
	
</head>
<body>

<div id="header">
	<img src="logo.png" name="logo" style="width:100%"/>
	
	<p id="layoutdims"><h1 style="text-align: center">Welcome to Online Library Management System</h1></p>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<br><br><br>
<form action="" method="POST" >
<input type="text" name="email"  placeholder="Enter your email id">
<input type="submit" name="submit" value="submit" >
</form>

<?php
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('library') or die("cannot select DB");
	$query=mysql_query("SELECT Email,Password FROM admin WHERE Email='".$email."'");
	$row=mysql_fetch_assoc($query);

	if($query==FALSE)
	{
		echo"invalid email id";
		header("Refresh: 5; url=admin_login.php");
 
	}
	else{
		$password = $row['Password'];
		$email= $row['Email'];
		require 'PHPmail/PHPMailerAutoload.php';

require 'PHPmail/class.phpmailer.php'; // path to the PHPMailer class
require 'PHPmail/class.smtp.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;    

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'Smtp.gmail.com;Smtp.live.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mayur.pathak52@gmail.com';                 // SMTP username
$mail->Password = 'may_ur123gmail#';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mayur.pathak52@gmail.com', 'mayur');    // Add a recipient
$mail->addAddress($email);  
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Subject';
$mail->Body    = "Your password is " . $password;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    
} else {
    echo 'Message has been sent';
	header("Refresh: 2; url=admin_login.php");
	}
	}
	
}
	?>
				<br><br><br><br><br><br>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
					<br><br>
					<a href="student_login.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Login</b></a><br><br>
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
<?php }?>