<?php
include 'connect.php';
$HotelID=(int)$_POST['hid'];



$sql = "SELECT ROOM.*,RoomImage.PATH FROM ROOM
		INNER JOIN RoomImage
        ON RoomImage.Room_ID=ROOM.ID
 WHERE ROOM.Hotel_ID = $HotelID";



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