<?php
include "conn_init.php";
$email=$_GET["mail"];
$token=$_GET["token"];
$oldmail="";
$sql="SELECT email, pass FROM Utente ";
$result = mysqli_query($con,$sql);
$flag2=false;
echo "<html style='height:100%;'>
<head>
<script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css'>
    <meta charset='UTF-8'>
    <script src='../myscript.js'></script>
    <link rel='stylesheet' href='../mystyle.css'>
</head>
<body class='d-flex flex-column h-100'>
      <main class='flex-grow-1'>
      <nav id='navbar' class='navbar navbar-light' style='background-color: rgba(30, 67, 86)' >
        <div class='container-fluid'>
          <a class='navbar-brand' style='color: white;' href='index.html'>Cantiere Buzi Donaldo</a>
          <button type='button' class='btn btn-primary btn-lg'><i class='bi bi-person-circle'></i></button>
        </div>
      </nav> 
      <div id='container' class='container' style='max-width: 100%; background-color: rgba(255, 255, 255);'>
      ";
while($row = $result->fetch_row()) {
    if(md5($email.$row[0].$row[1]."ino20fn20n2ef0ne2f0n")==$token){
       $flag2=true;
       $oldmail=$row[0];
   }
}
if($flag2){
$sql="UPDATE utente SET Email='$email' WHERE email='$oldmail' ";
$result = mysqli_query($con,$sql);
if(mysqli_affected_rows ( $con )!=0){
  echo "<div class='row justify-content-center'>";
  echo "<div class='col-12'><lottie-player src='../icon_json/ok.json' background='transparent'  speed='1'  style='width: 350px; height: 350px; margin: 0 auto;'   autoplay></lottie-player></div>";
  echo ("<div class='col-12 col-md-6 text-center'>A breve verrai reinderizzato alla pagina di login.</div></div>");
}
else{
  echo "<div class='row'>";
  echo "<div class='col-12'><lottie-player src='../icon_json/error.json' background='transparent'  speed='1'  style='width: 350px; height: 350px; margin: 0 auto;'   autoplay></lottie-player></div>";
  echo ("<div class='col-12 col-md-6 mt-md-5 text-center'>A breve verrai reinderizzato alla pagina di login.</div></div>");
}
}
else{
  echo "<div class='row'>";
  echo "<div class='col-12'><lottie-player src='../icon_json/wrong.json' background='transparent'  speed='1'  style='width: 350px; height: 350px; margin: 0 auto;'   autoplay></lottie-player></div>";
  echo ("<div class='col-12 col-md-6 mt-md-5 text-center'>Hai già cambiato email o hai provato a modificare il link. A breve verrai reinderizzato alla pagina di login.</div></div>");
}
echo "
</div>
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