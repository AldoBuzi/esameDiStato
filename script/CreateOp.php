<?php
$allid = array("email","fpassword","CF","nome","cognome","nascita","luogo","SelectUtente");
$AllValues=  array();
$flag=true;
foreach($allid as $key){
    $AllValues[$key]= $_GET[$key];
    if($AllValues[$key]==""){
      $flag=false;
    }
}
if($flag){
  include "conn_init.php";
$sql="INSERT INTO Utente VALUES(";
foreach($AllValues as $key=>$value){
  $sql=$sql."'".$value."',";
}
$sql= substr($sql,0,(strlen($sql)-1));
$sql=$sql.")";
$result = mysqli_query($con,$sql);

if($result){
 echo " 
 <script src='https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js'></script>
 <lord-icon
     src='https://cdn.lordicon.com//jvihlqtw.json'
     trigger='loop'
     colors='primary:#121331,secondary:#08a88a'
     style='width:250px;height:250px'>
 </lord-icon>";
}
else{
  echo("Errore: Dati duplicati");
}
mysqli_close($con);
}
else{
  echo "Hai inserito campi vuoti!";
}
?>