<?php
$con = mysqli_connect('localhost','root','','cantierebuzi');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
$check =isset($_COOKIE['AutoLog'])? $_COOKIE['AutoLog']: "";
$session= isset($_COOKIE["sessioncook"])?$_COOKIE["sessioncook"]:"";
$sql="SELECT email,pass FROM utente";
$result = mysqli_query($con,$sql);
$flag=false;
while($row = $result->fetch_row()) {
  if(md5($row[0].$row[1])==$check||md5($row[1].$row[0].$row[1]."aaa")==$session){
      $flag=true;
  }
}  
  ?>