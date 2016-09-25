
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
	$con=mysqli_connect('localhost','root','','library') or die(mysql_error());
	
	$query=mysqli_query($con,"SELECT Email,Password FROM admin WHERE Email='".$email."'");
	
if(mysqli_num_rows($query)==1)
  {
    while($row=mysqli_fetch_array($query))
    {
      $email1=md5($row['Email']);
	  $email=$row['Email'];
      $pass=md5($row['Password']);
    }
    $link="<a href='localhost/Latest%20library/reset.php?key=".$email1."&reset=".$pass."'>Click To Reset password</a>";
    
    
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
		$mail->Body    = 'Click On This Link to Reset Password '.$link.'';
		$mail->AltBody = 'reset link';

		if(!$mail->send())
			{
			 echo "Mail Error - >".$mail->ErrorInfo;
    }
			else 
			{
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
					<a href="admin_login.php" style="font-size:25px; background-color:transparent;text-decoration:none; color:#369; "><b>Login</b></a><br><br>
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
	
	<p>&copy; Online Library Portal</p>
	<p><a href="#">Mayur Pathak, Nakshatra Pradhan & Akshat Srivastava</a></p>
	
</div>

</body>
</html>