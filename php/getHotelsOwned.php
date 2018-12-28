<?php
include 'connect.php';
$OwnerID=(int)$_POST['oid'];



$sql = "SELECT Hotel.*,Hotel.ID AS HID , Location.* , SUM(CASE WHEN HotelPayment.isPaid = 0 THEN HotelPayment.Payment ELSE 0 END) AS 'MONEY' FROM Owners
	INNER JOIN Hotel
		On Owners.ID = Hotel.Owner_ID
    INNER JOIN Location
    	ON Location.ID = Hotel.Location
    LEFT JOIN 	HotelPayment
    	ON Hotel.ID = HotelPayment.HotelID
        WHERE Owners.ID =$OwnerID
        OR HotelPayment.Payment IS NULL AND Owners.ID =$OwnerID
        
        GROUP BY Hotel.ID";



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