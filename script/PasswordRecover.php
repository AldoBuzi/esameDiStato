<?php
include "conn_init.php";
include "MailSender.php";
$sql="SELECT Pass, Nome, Cognome FROM Utente WHERE email='$email'";
$result = mysqli_query($con,$sql);
$email= $_GET["email"];
while($row = $result->fetch_row()) {
    $mail->AddCC("buziofficial00001@gmail.com", "Recupero Password");
    $mail->AddAddress($email, $row[1]." ".$row[2]);
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
mysqli_close($con);
?>