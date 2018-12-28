<?php
include 'connect.php';


$STDATE=$_POST['STDATE'];;
$EDATE=$_POST['EDATE'];
$CITY=$_POST['CITY'].'%';
$CAP=(int)$_POST['CAP'];

$sql = "SELECT temp.HNAME,temp.HOTELID , temp.STARS  ,temp.TYPE ,temp.Country,temp.City,temp.Street,
temp.ID , temp.CAP , temp.PRICE ,temp.NO_AV,temp.NAME,temp.RoomCount,temp.RATING,temp.PATH

FROM


(

(SELECT Hotel.HNAME ,Hotel.ID AS HOTELID , Hotel.STARS  ,Hotel.TYPE ,Location.Country,Location.City,Location.Street,RoomImage.PATH,
ROOM.ID , ROOM.CAP , ROOM.PRICE ,ROOM.NO_AV,ROOM.NAME,(ROOM.NO_AV- COUNT(Reservation.RoomID)) AS RoomCount,MAX(Reservation.EndDate) AS MaxDate ,AVG(CASE WHEN CUST_RATING.RATING IS NOT NULL THEN CUST_RATING.RATING ELSE 0 END) AS RATING FROM ROOM 
INNER JOIN RoomImage
ON RoomImage.Room_ID=ROOM.ID
		INNER JOIN Hotel
        	ON Hotel.ID = ROOM.Hotel_ID
        INNER JOIN Location
            ON Hotel.Location= Location.ID
            LEFT JOIN CUST_RATING
            ON Hotel.ID=CUST_RATING.HOTEL_ID
        LEFT JOIN Reservation 
        	ON ROOM.ID = Reservation.RoomID
WHERE '$STDATE' >= Reservation.StartDate AND '$EDATE' <= Reservation.EndDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1 AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY' 
OR '$STDATE' < Reservation.StartDate AND '$EDATE' > Reservation.EndDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.EndDate > '$STDATE' AND  Reservation.EndDate < '$EDATE' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.StartDate > '$STDATE' AND Reservation.StartDate < '$EDATE' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.StartDate = '$STDATE' AND Reservation.EndDate= '$EDATE' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
GROUP BY(ROOM.ID)
)

UNION

(SELECT Hotel.HNAME ,Hotel.ID AS HOTELID , Hotel.STARS  ,Hotel.TYPE ,Location.Country,Location.City,Location.Street,RoomImage.PATH,
ROOM.ID , ROOM.CAP , ROOM.PRICE ,ROOM.NO_AV,ROOM.NAME,(ROOM.NO_AV) AS RoomCount,MAX(Reservation.EndDate) AS MaxDate ,AVG(CASE WHEN CUST_RATING.RATING IS NOT NULL THEN CUST_RATING.RATING ELSE 0 END) AS RATING FROM ROOM 
INNER JOIN RoomImage
ON RoomImage.Room_ID=ROOM.ID
		INNER JOIN Hotel
        	ON Hotel.ID = ROOM.Hotel_ID
        INNER JOIN Location
            ON Hotel.Location= Location.ID
            LEFT JOIN CUST_RATING
            ON Hotel.ID=CUST_RATING.HOTEL_ID
        LEFT JOIN Reservation 
        	ON ROOM.ID = Reservation.RoomID
WHERE '$STDATE' < Reservation.StartDate AND '$EDATE' <= Reservation.StartDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1 AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY' 
OR '$STDATE' >= Reservation.EndDate AND '$EDATE' > Reservation.EndDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.StartDate < '$EDATE' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.EndDate < '$STDATE' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.CAP=$CAP AND Location.City LIKE '$CITY'
OR Reservation.EndDate IS NULL AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND ROOM.CAP=$CAP
OR Reservation.Approved=0 AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND ROOM.CAP=$CAP
 
GROUP BY(ROOM.ID)
HAVING (ROOM.NO_AV)>0)
    
)AS temp
    GROUP BY(temp.ID)
    ORDER BY temp.TYPE DESC";



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