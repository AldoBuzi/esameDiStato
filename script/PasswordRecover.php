<?php
include "conn_init.php";
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
$mail->AddAddress("aldomob00@gmail.com", "Cliente");
$mail->SetFrom("buziofficial00001@gmail.com", "Cantiere Buzi");
$mail->AddReplyTo("buziofficial00001@gmail.com", "Cantiere Buzi");
$mail->AddCC("buziofficial00001@gmail.com", "Cantiere Buzi");
$mail->Subject = "Recupero Password Cantiere Buzi";
$content = "<b>Questa è la password</b>";
$mail->MsgHTML($content); 
$mail->SMTPDebug = 0;
if(!$mail->Send()){
    echo "errore";
}
else{
    echo "email inviata";
}
?>