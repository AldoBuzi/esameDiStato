<?php
include "conn_init.php";
$email=$_GET["mail"];
$token=$_GET["token"];
$oldmail="";
$sql="SELECT email, pass FROM Utente ";
$result = mysqli_query($con,$sql);
$flag=false;
echo ($token."\n");
while($row = $result->fetch_row()) {
    echo (md5($email.$row[0].$row[1]."ino20fn20n2ef0ne2f0n")."\n");
    if(md5($email.$row[0].$row[1]."ino20fn20n2ef0ne2f0n")==$token){
       $flag=true;
       $oldmail=$row[0];
   }
}
if($flag){
$sql="UPDATE Utente SET Email='$email' WHERE email='$oldmail' ";
$result = mysqli_query($con,$sql);
if($result){
    echo "Email cambiata con successo";
}
else{
    echo "Error";
}
}
else{
    echo "Errore";
}
?>