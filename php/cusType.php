<?php
include 'connect.php';



$custID=$_POST['custID'];




$sql2 = "SELECT `TYPE` FROM `customer` WHERE customer.ID=$custID";
      $resul = $conn->query($sql2);
  if ($resul->num_rows > 0) {
    while($row = $resul->fetch_assoc()) {
     echo $row["TYPE"];
    }
  }else{
    echo "-1";
  }

$conn->close();

?>