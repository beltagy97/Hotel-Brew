<?php
include 'connect.php';

$CustID=(int)$_POST['custID'];

$sql = "SELECT Reservation.ID,Reservation.StartDate,RoomImage.PATH,ROOM.ID AS roomID,Reservation.TotalPrice,Reservation.ReservDate,Reservation.CheckIN,Reservation.EndDate,Hotel.HNAME,ROOM.NAME,Reservation.Approved,ROOM.CAP FROM Reservation 
	INNER JOIN ROOM 
    	ON Reservation.RoomID = ROOM.ID
    	INNER JOIN RoomImage
ON RoomImage.Room_ID=ROOM.ID
    INNER JOIN Hotel
    	ON ROOM.Hotel_ID=Hotel.ID
        WHERE Reservation.CustID=$CustID
        
        ORDER BY Reservation.ReservDate DESC";



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