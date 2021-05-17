<?php
include 'conn_init.php';
$ses= $_GET["y"];
$autolog= $_GET["x"];
$sql='SELECT email,nome, cognome, CF, DataNasc, LuogoNasc, TipoUt, Pass FROM Utente ';
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
    if(md5($row[0].$row[7])==$autolog||md5($row[7].$row[0].$row[7]."aaa")==$ses){
      setcookie("name",$row[1]." ".$row[2],0,"/");
      $_COOKIE["name"]= "$row[1]"." "."$row[2]";
        echo "<div class='tab-content' id='v-pills-tabContent'>
        <div class='tab-pane fade show active' id='v-pills-home' role='tabpanel' aria-labelledby='v-pills-home-tab'>
          <div class='row text-center'>
          <div class='col-12 col-md-4 mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>Nome</label>
              <input type='text' class='form-control text-center' id='exampleFormControlInput1' value='$row[1]' readonly>
            </div>
            <div class='col-12 col-md-4 mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>Cognome</label>
              <input type='text' class='form-control text-center' id='exampleFormControlInput1' value='$row[2]' readonly>
            </div>
            <div class='col-12 col-md-4 mb-3'>
              <label for='exampleFormControlInput1' class='form-label'>Tipo Utente</label>
              <input type='email' class='form-control text-center' id='exampleFormControlInput1' value='$row[6]'  readonly>
            </div>
            <div class='col-12 col-md-6 mb-3'>
              <label for='exampleFormControlTextarea1' class='form-label'>indirizzo email</label>
              <input type='email' class='form-control text-center' id='exampleFormControlInput1'  value='$row[0]' readonly>
                  </div>
            <div class='col-12 col-md-6 mb-3'>
              <label for='exampleFormControlTextarea1' class='form-label'>Codice Fiscale</label>
              <input type='email' class='form-control text-center' id='exampleFormControlInput1'  value='$row[3]' readonly>    </div>
            <div class='col-12 col-md-6 mb-3'>
              <label for='exampleFormControlTextarea1' class='form-label'>Luogo di nascita</label>
              <input type='email' class='form-control text-center' id='exampleFormControlInput1'  value='$row[5]' readonly>
              </div>
            <div class='col-12 col-md-6 mb-3'>
              <label for='exampleFormControlTextarea1' class='form-label'>Data di nascita</label>
              <input type='text' class='form-control text-center' id='exampleFormControlInput1'  value='$row[4]' readonly>
            </div>
          </div>
        </div>
        <div class='tab-pane fade' id='v-pills-profile' role='tabpanel' aria-labelledby='v-pills-profile-tab'>
        <div class='row text-center'>
        <div class='col-12 mb-3 text-center'>
            <label for='exampleFormControlInput1' class='form-label'>Inserisci Nuova Email</label>
            <input type='email' class='form-control' id='nmail' placeholder='name@example.com' required>
          </div>
          <div class='col-12 mb-3 text-center'>
          <label for='exampleFormControlInput1' class='form-label'>Inserisci Password di conferma</label>
          <input type='password' class='form-control' id='epass' required>
        </div>
  <div class='col-12 mb-3 mt-3'>
  <div class='d-grid gap-2'>
      <button class='btn btn-primary' onclick='SetNewMail();' type='button'>Cambia Mail</button>
    </div>
  </div>
  <div id='MailResult' class='col-12 col-md-9 d-flex justify-content-center mt-0 px-0' >
              </div>
        </div>
        </div>
        <div class='tab-pane fade' id='v-pills-messages' role='tabpanel' aria-labelledby='v-pills-messages-tab'>
        <div class='row text-center'>
        <div class='col-12 mb-3 text-center'>
            <label for='exampleFormControlInput1' class='form-label'>Inserisci Password precedente</label>
            <input type='password' class='form-control' id='opass'  required>
          </div>
          <div class='col-12 mb-3 text-center'>
          <label for='exampleFormControlInput1' class='form-label'>Inserisci Nuova Password</label>
          <input type='password' class='form-control' id='npass' required>
        </div>
  <div class='col-12 mb-3 mt-3'>
  <div class='d-grid gap-2'>
      <button class='btn btn-primary' onclick='SetNewPassword();' type='button'>Crea Nuova Password</button>
    </div>
  </div>
  <div id='PasswordResult' class='col-12 col-md-9 d-flex justify-content-center mt-0 px-0' >
              </div>
        </div>
        </div>
        <div class='tab-pane fade' id='v-pills-settings' role='tabpanel' aria-labelledby='v-pills-settings-tab'>
        <div class='row text-center'>
        <div class='col-12 mb-3 text-center'>
            <label for='exampleFormControlInput1' class='form-label'>Inserisci Email</label>
            <input type='email' class='form-control' id='memail' placeholder='' required>
          </div>
          
  <div class='col-12 mb-3 mt-3'>
  <div class='d-grid gap-2'>
      <button class='btn btn-primary' onclick='DownloadData();' type='button'>Invia Mail</button>
    </div>
  </div>
  <div id='DataResult' class='col-12 col-md-9 d-flex justify-content-center mt-5 px-0' >
              </div>
        </div>
        </div>
        </div>";
    }
}
mysqli_close($con);
?>
