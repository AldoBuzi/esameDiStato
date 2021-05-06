<?php
$index=$_GET["index"];
include "conn_init.php";
$sql="SELECT via, NumCantiere FROM Cantiere";
$result = mysqli_query($con,$sql);
if($index==0){
echo "<option value=''>Seleziona Cantiere</option>";
}
else{
  echo "<option value=0></option>";
}
while($row = $result->fetch_row()) {
    echo "<option value=".$row[1].">".$row[0]."</option>";
}
mysqli_close($con);
?>
