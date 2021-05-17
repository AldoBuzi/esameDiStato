<?php
include "conn_init.php";
if(!$flag){
    setcookie("AutoLog","", time()-360000);
    header("Location: ../Login.html");
    echo("qua");
}   
?>