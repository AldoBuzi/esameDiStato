<?php
$y=$_GET["y"];
$x=$_GET["x"];
$con = mysqli_connect('localhost','root','','cantierebuzi');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
$sql="SELECT email,pass FROM utente";
$result = mysqli_query($con,$sql);
$flag=0;
while($row = $result->fetch_row()) {
  if(md5($row[0].$row[1])==$x||md5($row[1].$row[0].$row[1]."aaa")==$y){
      $flag=1;
  }
}
echo ("$flag");  
mysqli_close($con);

?>