<?php
session_start();
$check =isset($_COOKIE['AutoLog'])? $_COOKIE['AutoLog']: "";
include "conn_init.php";
$sql="SELECT email,pass FROM Utente";
$result = mysqli_query($con,$sql);
$flag=false;
$session= isset($_SESSION["session"])?$_SESSION["session"]:"";
echo($session);
while($row = $result->fetch_row()) {
    if(md5($row[0].$row[1])==$check||md5($row[0].$row[1].$row[0]."aaa")==$session){
        $flag=true;
        echo($check);
    }
}    
if(!$flag){
    setcookie("AutoLog","", time()-360000);
    header("Location: ../Login.html");
    echo("qua");
}   
?>