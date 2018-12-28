<?php
include 'connect.php';



$ResvID=(int)$_POST['RESVID'];
$custID=$_POST['custID'];





$sql2 = "UPDATE Reservation SET Reservation.CheckIN=1 WHERE Reservation.ID=$ResvID";
if ($conn->query($sql2) === TRUE) {
    $sql2 = "INSERT INTO `HotelPayment`( `HotelID`, `Payment`, `DATE`) 
SELECT ROOM.Hotel_ID,Reservation.TotalPrice*0.09,Reservation.StartDate FROM Reservation
    INNER JOIN ROOM
    ON Reservation.RoomID=ROOM.ID
    
    WHERE Reservation.ID=$ResvID";
    
    if ($conn->query($sql2) === TRUE) {
    	echo "1";
    	
    	$sql2 = "SELECT COUNT(*) AS count FROM `Reservation` WHERE Reservation.CustID='$custID' AND Reservation.CheckIN=1";
    	$resul = $conn->query($sql2);
	if ($resul->num_rows > 0) {
  	while($row = $resul->fetch_assoc()) {
       if($row["count"]>=5){
       	$sql2 = "UPDATE `customer` SET `TYPE`=1 WHERE `ID`=$custID";
    	$results = $conn->query($sql2);
       
       
    	}
    
    }
    
    }
    
    }else{
    echo "0".$conn->error;
    }
} else {
    echo "0".$conn->error;
}

$conn->close();

?>