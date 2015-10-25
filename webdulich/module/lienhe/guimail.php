<?php
$email = isset($_POST['email'])?$_POST['email']:"" ;
$message = isset($_POST['message'])?$_POST['message']:"" ;

if($email!=null && $message!=null)
{ 
require_once(ROOT."/plugins/PHPMailer/class.phpmailer.php");
 
$mail = new PHPMailer();
 
// set mailer to use SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port=465;
$mail->SMTPSecure = 'ssl';

     // turn on SMTP authentication
 
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: contact@domain.com
// pass: password
$mail->Username = 'mikatshop@gmail.com';  // SMTP username
$mail->Password = 'Anhchangngoc'; // SMTP password
 
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;
$mail->CharSet = 'utf-8';
// below we want to set the email address we will be sending our email to.
$mail->Subject = 'Khách hàng liên hệ';
$mail->msgHTML($message);
$mail->addAddress('lethithanhmy25@gmail.com');
 
//echo !extension_loaded('openssl')?"Not Available":"Available"; 
if(!$mail->send())
{
   echo 'Message could not be sent. <p>';
   echo "Mailer Error: " . $mail->ErrorInfo;
}
else
	echo "Gửi mail thành công!!!";
}
?>