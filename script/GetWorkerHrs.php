<?php
$date= $_GET["month"];
$month = date("m",strtotime($date));
$year= date("Y",strtotime($date));
$days=0;
include "conn_init.php";
echo"<thead>
              <tr>
                <th scope='col-1'>#</th>
                <th scope='col-2'>Nome</th>
                <th scope='col-2'>Cognome</th>
                <th scope='col-2'>Ore Lavorate</th>
              </tr>
            </thead>
            <tbody>";
$sql="SELECT Utente.nome, Utente.cognome,SvolgeOperazione.Data,SUM( SvolgeOperazione.Durata) FROM SvolgeOperazione INNER JOIN Utente ON SvolgeOperazione.email=Utente.email WHERE year(Data)='$year' AND $month = month(Data) GROUP BY svolgeoperazione.email";
$result = mysqli_query($con,$sql);
$index=1;
while($row = $result->fetch_row()) {
    echo "<tr>";
    echo"<th scope='row'>".$index."</th>";
    $index++;
        echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[3]."</td>";
    echo "</tr>";
}
echo "</tbody>";
mysqli_close($con);
?>