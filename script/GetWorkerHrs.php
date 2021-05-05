<?php
$date= $_GET["month"];
$month = date("m",strtotime($date));
$year= date("Y",strtotime($date));
$days=0;
$con = mysqli_connect('localhost','root','','cantierebuzi');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
echo"<thead>
              <tr>
                <th scope='col-1'>#</th>
                <th scope='col-2'>Nome</th>
                <th scope='col-2'>Cognome</th>
                <th scope='col-2'>Ore Lavorate</th>
              </tr>
            </thead>
            <tbody>";
$sql="SELECT Utente.nome, Utente.cognome,SvolgeOperazione.DataInizio,SvolgeOperazione.DataFine FROM SvolgeOperazione INNER JOIN Utente ON SvolgeOperazione.email=Utente.email WHERE year(DataInizio)='$year' AND $month BETWEEN month(DataInizio) AND month(DataFine) ";
$result = mysqli_query($con,$sql);
$index=1;
while($row = $result->fetch_row()) {
    echo "<tr>";
    echo"<th scope='row'>".$index."</th>";
    $index++;
    if (date("m",strtotime($row[3]))>date("m",strtotime($row[2]))){
       if($month==date("m",strtotime($row[2]))){
        $days=(date("t",strtotime($row[2]))-date("d",strtotime($row[2])));
       }
       else if($month!=date("m",strtotime($row[2]))&&$month!=date("m",strtotime($row[3]))){
        $days=(date("t",strtotime($month)));
       }

       else{
        $days=(date("d",strtotime($row[3])));
       }
    }
    else{
        $days=(date("d",strtotime($row[3]))-date("d",strtotime($row[2])));
    }
    if($days!=0){
        echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".($days*10)."</td>";
    }
    echo "</tr>";
}
echo "</tbody>";
mysqli_close($con);
?>