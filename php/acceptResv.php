<?php
include 'connect.php';



$ResvID=(int)$_POST['RESVID'];



$sql2 = "UPDATE Reservation SET Reservation.Approved=1 WHERE Reservation.ID=$ResvID";
if ($conn->query($sql2) === TRUE) {
   
    echo "1";
    }else{
     echo "0".$conn->error;
    }


$conn->close();

?>