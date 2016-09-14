<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$email='akshatkumarsrivastava@gmail.com';
 
$mail = new PHPMailer;
//$mail->SMTPDebug = 4;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'nakshatrapradhan2013';  
$mail->Password = '';  //<<--- my gmail password
$mail->From = 'nakshatrapradhan2013@gmail.com';
$mail->FromName = 'Title From';
$mail->isHTML(true);
$mail->addAddress('akashatsrivastava2@gmail.com');     // Add a recipient
//$mail->addReplyTo($email, $korpaime.' '.$korpaprezime);
//$mail->addCC('cc@example.com');
$mail->addBCC('nakshatrapradhan2013@gmail.com');
        // Add attachments
    // Optional name

$mail->Subject = 'first message '.$email;
$mail->Body = 'mail aaya mail aaya';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    die;
} else {
echo 'OK  mail is sended';}

?>