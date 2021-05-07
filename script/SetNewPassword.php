<?php
include "conn_init.php";
$opass= $_GET["opass"];
$npass= $_GET["npass"];
$sql="SELECT email, pass FROM Utente ";
$ses= $_GET["y"];
$autolog= $_GET["x"];
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
 if(($ses==md5($row[1].$row[0].$row[1]."aaa")||$autolog==md5($row[0].$row[1]))){
     $email=$row[0];
 }
}
$sql="UPDATE Utente SET Pass ='$npass' WHERE pass='$opass' and email='$email'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo ("andato a buon fine");
        setcookie("sessioncook","", time()-77200,"/");
  setcookie("AutoLog", "", time()-360000,"/");
    }
    else{
        echo ("andata male");
    }
    mysqli_close($con);
?>