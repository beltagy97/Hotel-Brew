<?php
include 'connect.php';

$CustID=(int)$_POST['custID'];


$sql = "SELECT  Reservation.ID , Reservation.StartDate , Reservation.EndDate , Hotel.HNAME , Reservation.isRated FROM Reservation 
	INNER JOIN ROOM
    	ON Reservation.RoomID = ROOM.ID
    INNER JOIN Hotel
    	ON ROOM.Hotel_ID = Hotel.ID
WHERE Reservation.Approved = 1 AND Reservation.CheckIN = 1 AND Reservation.isRated = 0 AND Reservation.CustID = $CustID

ORDER BY Reservation.StartDate DESC;
";

$result = $conn->query($sql);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}
$rows = array();

while($r = $result->fetch_assoc()){


    $rows[] =  $r;
}

echo json_encode($rows);

?>