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
    if(mysqli_affected_rows ( $con )!=0){
        echo "<div class='row'>";
        echo "<div class='col-12 col-md-6'><lottie-player src='icon_json/ok.json' background='transparent'  speed='1'  style='width: 150px; height: 150px; margin: 0 auto;'   autoplay></lottie-player></div>";
        echo ("<div class='col-12 col-md-6'>A breve verrai reinderizzato alla pagina di login.</div></div>");
        setcookie("sessioncook","", time()-77200,"/");
        setcookie("AutoLog", "", time()-360000,"/");
    }
    else{
        echo "<div class='row'>";
        echo "<div class='col-12 col-md-6'><lottie-player src='icon_json/error.json' background='transparent'  speed='1'  style='width: 150px; height: 150px; margin: 0 auto;'   autoplay></lottie-player></div>";
        echo ("<div class='col-12 col-md-6 mt-md-5'>A breve verrai reinderizzato alla pagina di login.</div></div>");
    }
    mysqli_close($con);
?>