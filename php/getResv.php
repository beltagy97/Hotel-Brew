<?php
include 'connect.php';


$HotelID=(int)$_POST['HOTELID'];

$sql = "SELECT ROOM.NAME,customer.Name,ROOM.CAP,Reservation.StartDate,Reservation.ReservDate,Reservation.ID,Reservation.EndDate,Reservation.CheckIN,Reservation.Approved FROM Reservation
INNER JOIN ROOM
ON Reservation.RoomID=ROOM.ID
INNER JOIN customer
ON Reservation.CustID=customer.ID


WHERE ROOM.Hotel_ID=$HotelID";



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