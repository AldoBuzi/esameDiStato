<?php
include "conn_init.php";
$email=$_GET["mail"];
$token=$_GET["token"];
$oldmail="";
$sql="SELECT email, pass FROM Utente ";
$result = mysqli_query($con,$sql);
$flag=false;
echo "<html style='height:100%;'>
<head>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css'>
    <meta charset='UTF-8'>
    <script src='myscript.js'></script>
</head>
<body class='d-flex flex-column h-100'>
      <main class='flex-grow-1'>
      <nav class='navbar navbar-light bg-light'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='index.html'>Cantiere Buzi Donaldo</a>
          <div  id='profile' class='btn-group dropstart'>
            
          </div>
        </div>
      </nav>";
while($row = $result->fetch_row()) {
    if(md5($email.$row[0].$row[1]."ino20fn20n2ef0ne2f0n")==$token){
       $flag=true;
       $oldmail=$row[0];
   }
}
if($flag){
$sql="UPDATE Utente SET Email='$email' WHERE email='$oldmail' ";
$result = mysqli_query($con,$sql);
if($result){
    echo "Email cambiata con successo";
}
else{
    echo "Error";
}
}
else{
    echo "Errore";
}
echo "
</main>
<footer class='border-top p-0'>
        <!-- Copyright -->
        <div class='text-center p-3' style='background-color: rgb(226, 226, 226);'>
          © 2021 Copyright:
          <a class='text-dark' href='https://mdbootstrap.com/'>esamebuzi.com</a>
        </div>
        <!-- Copyright -->
      </footer>
</body>";
?>