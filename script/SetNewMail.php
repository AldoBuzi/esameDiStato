<?php
include "conn_init.php";
include "MailSender.php";
$epass= $_GET["epass"];
$nmail= $_GET["nmail"];
$session= isset($_COOKIE["sessioncook"])?$_COOKIE["sessioncook"]:"";
$cookie= isset($_COOKIE["AutoLog"])?$_COOKIE["AutoLog"]:"";
$sql="SELECT email, pass, nome, pass FROM utente ";
$ses= $_GET["y"];
$autolog= $_GET["x"];
$token="";
$result = mysqli_query($con,$sql);
$flag2=false;
while($row = $result->fetch_row()) {
 if(($session==md5($row[1].$row[0].$row[1]."aaa")||$cookie==md5($row[0].$row[1]))&&$epass==$row[1]){
     $mail->AddAddress($nmail, $row[2]." ".$row[3]);
     $token=md5($nmail.$row[0].$row[1]."ino20fn20n2ef0ne2f0n");
     $flag2=true;
}
}
if($flag2){
$mail->AddCC("buziofficial00001@gmail.com", "Conferma Nuovo Indirizzo Mail");
    $mail->Subject = "Conferma Nuovo Indirizzo Mail Cantiere Buzi";
    $content = "In merito la richiesta per l'utilizzo del nuovo indirizzo mail, la preghiamo di premere il link per confermare il cambiamento. <br>"."
     Link:
     <b> http://localhost/Elaborato/script/emailedit.php?token=$token&mail=$nmail</b>";  
$mail->MsgHTML($content); 
$mail->SMTPDebug = 0;
if(!$mail->Send()){
    echo "<div class='row'>";
        echo "<div class='col-12 col-md-6'><lottie-player src='icon_json/error.json' background='transparent'  speed='1'  style='width: 150px; height: 150px; margin: 0 auto;'   autoplay></lottie-player></div>";
        echo ("<div class='col-12 col-md-6 mt-md-5'>Errore interno! Ci scusiamo, riprova tra qualche minuto.</div></div>");
}
else{
    echo "<div class='row'>";
        echo "<div class='col-12 col-md-6 '><lottie-player src='icon_json/mail.json' background='transparent'  speed='1'  style='width: 150px; height: 150px; margin: 0 auto;'   autoplay></lottie-player></div>";
        echo ("<div class='col-12 col-md-6 mt-md-5'>Email inviata! A breve verrai reinderizzato alla pagina di login.</div></div>");
}
}
else{
    echo "<div class='row'>";
        echo "<div class='col-12 col-md-6'><lottie-player src='icon_json/wrong.json' background='transparent'  speed='1'  style='width: 150px; height: 150px; margin: 0 auto;'   autoplay></lottie-player></div>";
        echo ("<div class='col-12 col-md-6 mt-md-5'>Errore! Hai inserito una password errata.</div></div>");
}
mysqli_close($con);
?>