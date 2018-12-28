<?php
include 'connect.php';




$CustID=(int)$_POST['custID'];
$RoomID=(int)$_POST['roomID'];
$from=$_POST['from'];
$to=$_POST['to'];
$total=(int)$_POST['total'];
$datenow=date("Y-m-d H:i:s");



$sql2 = "INSERT INTO `Reservation`( `RoomID`, `CustID`, `TotalPrice`, `StartDate`, `EndDate`, `ReservDate`) VALUES ($RoomID,$CustID,$total,'$from','$to','$datenow')";
if ($conn->query($sql2) === TRUE) {
    echo "1";
} else {
    echo "0".$conn->error;
}

$conn->close();

?>