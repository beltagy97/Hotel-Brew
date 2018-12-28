<?php
include 'connect.php';



$sql = "SELECT Hotel.APPROVAL,Hotel.Suspended,Hotel.HNAME,Hotel.STARS,Hotel.ID AS HID , Location.Country,Location.City,Location.Street,Owners.NAME AS 'Owner_Name' , SUM(CASE WHEN HotelPayment.isPaid = 0 THEN HotelPayment.Payment ELSE 0 END) AS 'Due',SUM(CASE WHEN (month(current_timestamp) - month(HotelPayment.DATE)) = 1  THEN HotelPayment.Payment ELSE 0 END) AS 'Last_Month' FROM Owners
	INNER JOIN Hotel
		On Owners.ID = Hotel.Owner_ID
    INNER JOIN Location
    	ON Location.ID = Hotel.Location
    LEFT JOIN 	HotelPayment
    	ON Hotel.ID = HotelPayment.HotelID

        
        
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