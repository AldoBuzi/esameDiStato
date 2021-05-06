<?php
$dpi= $_GET["dpi"];
include "conn_init.php";
echo"<thead>
              <tr>
                <th scope='col-1'>#</th>
                <th scope='col-2'>Nome</th>
                <th scope='col-2'>Cognome</th>
              </tr>
            </thead>
            <tbody>";
$sql="SELECT DISTINCT Utente.Nome, Utente.Cognome FROM Utente INNER JOIN svolgeoperazione ON Utente.email=svolgeoperazione.email WHERE svolgeoperazione.NomeDPI='$dpi'";
$result = mysqli_query($con,$sql);
$index=1;
while($row = $result->fetch_row()) {
    echo "<tr>";
    echo"<th scope='row'>".$index."</th>";
    $index++;
        echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>";

    echo "</tr>";
}
echo "</tbody>";
mysqli_close($con);
?>