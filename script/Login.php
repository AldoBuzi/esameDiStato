<?php
//session_start();
$email= $_GET["email"];
$password= $_GET["password"];
$check= $_GET["check"];
include "conn_init.php";
  setcookie("Cook", "ciao", time()+960000,"/");
$sql="SELECT email FROM utente WHERE email='$email' and pass LIKE'$password'";
$result = mysqli_query($con,$sql);
if($result->num_rows > 0) {
    if($check=="true"){
    $md= md5($email.$password);
    setcookie("AutoLog","$md", time()+960000,"/",'cantierebuzi.it');
    $_COOKIE["AutoLog"]="$md";
    }
  $sess=md5($password.$email.$password."aaa");
    setcookie("sessioncook","$sess", time()+960000,"/");
  $_COOKIE["sessioncook"]="$sess";
  //echo($_COOKIE["Cook"]);
     echo("true");
}
else{
    echo("Email o Password errata");
}
mysqli_close($con);
exit;
?>