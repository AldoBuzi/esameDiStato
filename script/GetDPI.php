<?php
include "conn_init.php";
$sql="SELECT Nome FROM DPI";
$result = mysqli_query($con,$sql);
  echo "<option value=''></option>";
while($row = $result->fetch_row()) {
    echo "<option value = '".$row[0]."'";
    echo ">".$row[0]."</option>";
}
mysqli_close($con);
?>