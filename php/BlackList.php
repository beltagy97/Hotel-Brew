<?php
include 'connect.php';




$custID=$_POST['custID'];





$sql2 = "INSERT INTO `BlackList`(`CustID`, `StartDate`) 
SELECT DISTINCT Reservation.CustID,NOW() FROM Reservation 
WHERE Reservation.StartDate<date(NOW()) AND Reservation.CheckIN=0 AND Reservation.Approved=1 AND Reservation.checked=0 ";



if ($conn->query($sql2) === TRUE) {
    $sql2 = "DELETE FROM `BlackList` WHERE datediff(NOW(), BlackList.StartDate)>7";
    
    if ($conn->query($sql2) === TRUE) {
  	 $sql2 = "UPDATE `Reservation` SET Reservation.checked=1 WHERE  Reservation.StartDate<NOW() AND Reservation.CheckIN=0 AND Reservation.Approved=1 AND Reservation.checked=0;";
        if ($conn->query($sql2) === TRUE) {
      $sql2 = "SELECT * FROM `BlackList` WHERE BlackList.CustID=$custID";
      $resul = $conn->query($sql2);
      if ($resul->num_rows > 0) {
      echo "1";
      
    
    }else{
    echo "0";
    }
    }
    }
} else {
    echo "-1".$conn->error;
}

$conn->close();

?>