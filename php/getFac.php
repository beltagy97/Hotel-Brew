<?php
include 'connect.php';


$HotelID=(int)$_POST['HOTELID'];

$sql = "SELECT Facilities.Name,Facilities.Descr,FacilitiesImage.PATH FROM `Facilities` 

INNER JOIN FacilitiesImage
ON Facilities.ID=FacilitiesImage.FacID

WHERE Facilities.Hotel_ID=$HotelID";



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