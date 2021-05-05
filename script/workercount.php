<?php
$cantiere=$_GET["Cantiere"];
$con = mysqli_connect('localhost','root','','cantierebuzi');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
$sql="SELECT COUNT(*) FROM svolgeoperazione WHERE NumCantiere='$cantiere'";
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
echo "<div class='accordion-item'>
<h2 class='accordion-header' id='headingOne'>
  <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
    Rappresentazione numerica
  </button>
</h2>
<div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
  <div class='accordion-body'>
    In questo cantiere hanno lavorato: <strong>$row[0]</strong> dipendenti
  </div>
</div>
</div>";
}
$sql="SELECT Utente.Nome, Utente.Cognome FROM svolgeoperazione INNER JOIN Utente ON svolgeoperazione.email=utente.email WHERE NumCantiere='$cantiere'";
echo "<div class='accordion-item' >
          <h2 class='accordion-header' id='headingTwo'>
            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
              Dettagli Dipendenti
            </button>
          </h2>
          <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby=headingTwo' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
            <table class='table text-center'>
            <thead>
              <tr>
                <th scope='col-1'>#</th>
                <th scope='col-2'>Nome</th>
                <th scope='col-2'>Cognome</th>
              </tr>
            </thead>
            <tbody>";
$index=1;
$result = mysqli_query($con,$sql);
    while($row = $result->fetch_row()) {
        echo"<tr><th scope='row'>".$index."</th>";
        $index++;
        echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td></tr>";   
     }
    echo "
    </tbody>
    </table>
    </div>
          </div>
        </div>";
mysqli_close($con);
?>