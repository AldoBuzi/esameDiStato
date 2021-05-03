<?php
//session_start();
$email= $_GET["email"];
$password= $_GET["password"];
$check= $_GET["check"];
$con = mysqli_connect('localhost','root','','cantierebuzi');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  setcookie("sessioncook","", time()-77200);
  setcookie("AutoLog", "", time()-360000);
$sql="SELECT email FROM Utente WHERE email='$email' and pass='$password'";
$result = mysqli_query($con,$sql);
if($result->num_rows > 0) {
    echo("true");
    if($check=="true"){
    $md= md5($email.$password);
    setcookie("AutoLog", $md, time()+360000,"/");
    }
    $_SESSION["session"] = md5($password.$email.$password."aaa");
    //echo($_SESSION["session"]);
    setcookie("sessioncook",md5($password.$email.$password."aaa"),0,"/");
 
}
else{
    echo("Email o Password errata");
}
//echo($_COOKIE["sessioncook"]);
mysqli_close($con);
exit;
?>