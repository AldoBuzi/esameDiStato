<?php
include "conn_init.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
$email= $_GET["email"];
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
$sql="SELECT Pass, Nome, Cognome FROM Utente WHERE email='$email'";
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
    $mail->AddAddress($email, $row[1]." ".$row[2]);
    $mail->SetFrom("buziofficial00001@gmail.com", "Cantiere Buzi");
    $mail->AddReplyTo("buziofficial00001@gmail.com", "Cantiere Buzi");
    $mail->AddCC("buziofficial00001@gmail.com", "Recupero Password");
    $mail->Subject = "Recupero Password Cantiere Buzi";
    $content = "In merito la richiesta per il recupero della password. <br>"."
     La password e' la seguente:
     <b> $row[0]</b>";  
}
$mail->MsgHTML($content); 
$mail->SMTPDebug = 0;
if(!$mail->Send()){
    echo "errore";
}
else{
    echo "email inviata";
}
?>