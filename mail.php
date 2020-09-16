<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Mailer = "smtp";
// $mail->Host = "localhost";
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host = 'smtp.gmail.com';
$mail->Username   = "fourgrammer@gmail.com";
$mail->Password   = "sukasukasaya";

$mail->IsHTML(true);
$mail->AddAddress("yogabagas69@gmail.com", "recipient-name");
$mail->SetFrom("fourgrammer@gmail.com", "from-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

$mail->MsgHTML($content);
if (!$mail->Send()) {
    echo '<pre>';
    echo "Error while sending Email.";
    var_dump($mail);
} else {
    echo "Email sent successfully";
}
