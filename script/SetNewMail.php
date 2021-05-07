<?php
include "conn_init.php";
include "MailSender.php";
$epass= $_GET["epass"];
$nmail= $_GET["nmail"];
$sql="SELECT email, pass, nome, pass FROM Utente ";
$ses= $_GET["y"];
$autolog= $_GET["x"];
$token="";
$flag=false;
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
 if(($ses==md5($row[1].$row[0].$row[1]."aaa")||$autolog==md5($row[0].$row[1]))&&$epass=$row[1]){
     $mail->AddAddress($nmail, $row[2]." ".$row[3]);
     $token=md5($nmail.$row[0].$row[1]."ino20fn20n2ef0ne2f0n");
     $flag=true;
}
}
if($flag){
$mail->AddCC("buziofficial00001@gmail.com", "Conferma Nuovo Indirizzo Mail");
    $mail->Subject = "Conferma Nuovo Indirizzo Mail Cantiere Buzi";
    $content = "In merito la richiesta per l'utilizzo del nuovo indirizzo mail, la preghiamo di premere il link per confermare il cambiamento. <br>"."
     Link:
     <b> http://localhost/Elaborato/emailedit.php?token=$token&mail=$nmail</b>";  
$mail->MsgHTML($content); 
$mail->SMTPDebug = 0;
if(!$mail->Send()){
    echo "errore";
}
else{
    echo "email inviata";
}
}
else{
    echo "Password errata";
}
mysqli_close($con);
?>