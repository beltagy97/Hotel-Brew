<?php
include 'connect.php';

$CustID=$_POST['custId'];
$RoomID=(int)$_POST['roomID'];
$from=$_POST['from'];
$to=$_POST['to'];
$price=(int)$_POST['price'];
$datenow=date("Y-m-d");

$now= strtotime($to);
$your_date = strtotime($from);
$datediff = $now - $your_date;

$s=(int) round($datediff / (60 * 60 * 24));
$total=$s*$price;


$sql = "SELECT DISTINCT Hotel.HNAME , Hotel.STARS  ,Hotel.TYPE ,Location.Country,Location.City,Location.Street,
ROOM.ID , ROOM.CAP , ROOM.PRICE ,ROOM.NO_AV,ROOM.NAME,(ROOM.NO_AV- COUNT(Reservation.RoomID)) AS RoomCount,MAX(Reservation.EndDate) AS MaxDate ,AVG(CUST_RATING.RATING) AS RATING FROM ROOM 
		INNER JOIN Hotel
        	ON Hotel.ID = ROOM.Hotel_ID
        INNER JOIN Location
            ON Hotel.Location= Location.ID
            INNER JOIN CUST_RATING
            ON Hotel.ID=CUST_RATING.HOTEL_ID
        LEFT JOIN Reservation 
        	ON ROOM.ID = Reservation.RoomID
WHERE ('$from' >= Reservation.StartDate AND '$to' <= Reservation.EndDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND ROOM.ID=$RoomID
OR '$from' < Reservation.StartDate AND '$to' > Reservation.EndDate AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1   AND ROOM.ID=$RoomID
OR Reservation.EndDate > '$from' AND  Reservation.EndDate < '$to' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND  ROOM.ID=$RoomID
OR Reservation.StartDate > '$from' AND Reservation.StartDate < '$to' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND  ROOM.ID=$RoomID
OR Reservation.StartDate = '$from' AND Reservation.EndDate= '$to' AND  Hotel.Suspended=0 AND Hotel.APPROVAL=1 AND Reservation.Approved=1  AND  ROOM.ID=$RoomID
)



GROUP BY(ROOM.ID)
HAVING (ROOM.NO_AV-COUNT(Reservation.RoomID))>0";



$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       if($row["RoomCount"]>0){
       	$sql2 = "INSERT INTO `Reservation`( `RoomID`, `CustID`, `TotalPrice`, `StartDate`, `EndDate`, `ReservDate`, `CheckIN`, `Approved`, `isRated`) VALUES ($RoomID,$CustID,$total,'$from','$to','$datenow',0,-1,0)";
       	$resuls = $conn->query($sql2);
       }else{
       		$sql2 = "INSERT INTO `Reservation`( `RoomID`, `CustID`, `TotalPrice`, `StartDate`, `EndDate`, `ReservDate`, `CheckIN`, `Approved`, `isRated`) VALUES ($RoomID,$CustID,$total,'$from','$to','$datenow',1,0,0)";
       	$resuls = $conn->query($sql2);
       }
    }
} else {
   	$sql2 = "INSERT INTO `Reservation`( `RoomID`, `CustID`, `TotalPrice`, `StartDate`, `EndDate`, `ReservDate`, `CheckIN`, `Approved`, `isRated`) VALUES ($RoomID,$CustID,$total,'$from','$to','$datenow',1,-1,0)";
       	$resuls = $conn->query($sql2);
}




?>