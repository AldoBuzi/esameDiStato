<?php
$cf= $_GET["cf"];
$data= $_GET["data"];
include "conn_init.php";
if($flag){
echo"<thead>
              <tr>
                <th scope='col-1'>#</th>
                <th scope='col-2'>Tipo lavoro</th>
                <th scope='col-2'>Ore Lavorate</th>
              </tr>
            </thead>
            <tbody>";
$sql="SELECT SvolgeOperazione.NomeOperazione, svolgeoperazione.durata  FROM SvolgeOperazione INNER JOIN Utente ON SvolgeOperazione.email=Utente.email WHERE svolgeoperazione.data='$data' and utente.CF='$cf'";
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
}
else{
  echo "errore";
}
mysqli_close($con);
?>