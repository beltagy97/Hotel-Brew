<?php
include 'connect.php';



$ResvID=(int)$_POST['RESVID'];
$CustID = (int)$_POST['CustID'];
$rate =(int)$_POST['rating'];

$sql = "SELECT Reservation.StartDate , Reservation.EndDate , ROOM.Hotel_ID FROM Reservation INNER JOIN ROOM ON Reservation.RoomID = ROOM.ID WHERE Reservation.ID = $ResvID";


if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    	$startDate = $row[0];
    	$endDate = $row[1];
    	$hotelID = $row[2];
    	
    }
  // Free result set
  mysqli_free_result($result);
}


$sql2 = "UPDATE Reservation SET Reservation.isRated=1 WHERE Reservation.ID=$ResvID ";

if ($conn->query($sql2) === TRUE) {
    echo "1 successfully updated";
} else {
    echo "0".$conn->error;
}

$sql3 = "INSERT INTO `CUST_RATING`(`CUST_ID`, `HOTEL_ID`, `startDate`, `endDate`, `RATING`) VALUES ($CustID,$hotelID,'$startDate','$endDate',$rate)";
if ($conn->query($sql3) === TRUE) {
    echo "1 successfully inserted";
} else {
    echo "0".$conn->error;
}


$conn->close();

?>