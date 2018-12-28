<?php
include 'connect.php';


$HotelID=$_POST['HotelID'];




$sql2 = "UPDATE `HotelPayment` SET `isPaid`=1 WHERE HotelPayment.HotelID=$HotelID";
if ($conn->query($sql2) === TRUE) {
    echo "1";
} else {
    echo "0".$conn->error;
}

$conn->close();

?>