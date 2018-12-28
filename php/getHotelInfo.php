<?php
include 'connect.php';
$HotelID=(int)$_POST['hid'];



$sql = "SELECT Hotel.HNAME , Hotel.STARS  , Location.*  FROM Hotel 
	INNER JOIN Location
    	ON Hotel.Location = Location.ID
        WHERE Hotel.ID = $HotelID
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