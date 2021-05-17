<?php
include "conn_init.php";
$session= isset($_COOKIE["sessioncook"])?$_COOKIE["sessioncook"]:"";
$cookie= isset($_COOKIE["AutoLog"])?$_COOKIE["AutoLog"]:"";
$Tipo=2;
$sql="SELECT email, pass,nome, cognome,TipoUt FROM Utente ";
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
 if($session==md5($row[1].$row[0].$row[1]."aaa")||$cookie==md5($row[0].$row[1])){
    echo "<button class='btn btn-primary ' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
    <i class='bi bi-person-circle'> $row[2]</i>
</button>";
$Tipo= $row[4];
$nome= $row[2];
$cognome= $row[3];
 }
}
if($Tipo==1){
    echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
    <li><a class='dropdown-item' href='profile.html'> Bentornato $nome $cognome</a></li>
    <li><a class='dropdown-item' href='signup.html'>Crea account operaio </a></li>
    <li><a class='dropdown-item' onclick='SendLogOut();'>Logout</a></li>
  </ul>";
}
else if($Tipo==0){
    echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
    <li><a class='dropdown-item' href='#'>Bentornato $nome $cognome</a></li>
    <li><a class='dropdown-item' onclick='SendLogOut();'>Logout</a></li>
  </ul>";
}
mysqli_close($con);
?>  