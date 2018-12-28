<?php
include 'connect.php';


$HotelID=$_POST['HotelID'];
$NAME=$_POST['NAME'];
$PRICE=(int)$_POST['PRICE'];
$NO=(int)$_POST['NO'];
$CAP=(int)$_POST['CAP'];
$PATH=$_POST['PATH'];




$sql2 = "INSERT INTO `ROOM`( `Hotel_ID`, `CAP`, `NO_AV`, `PRICE`, `NAME`) VALUES ('$HotelID',$CAP,$NO,$PRICE,'$NAME')";
if ($conn->query($sql2) === TRUE) {
     $sql2 = "SELECT `ID` FROM `ROOM` WHERE ROOM.Hotel_ID='$HotelID' AND ROOM.NAME='$NAME' ;";
	
    $result = $conn->query($sql2);
    
    
    if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
    $i=$row['ID'];
      $sql2="INSERT INTO `RoomImage`(`Room_ID`, `Path`) VALUES ($i,'$PATH')";
       if ($conn->query($sql2) === TRUE) {
        echo "1";
        break;
       }else{
        echo "0".$conn->error;
       }

}

}else{
echo "0".$conn->error;
}
    
    
} else {
    echo "0".$conn->error;
}

$conn->close();

?>