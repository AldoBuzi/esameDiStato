<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "buziofficial00001@gmail.com";
$mail->Password   = "AnilaITI3";
$mail->IsHTML(true);
$mail->SetFrom("buziofficial00001@gmail.com", "Cantiere Buzi");
$mail->AddReplyTo("buziofficial00001@gmail.com", "Cantiere Buzi");
?>