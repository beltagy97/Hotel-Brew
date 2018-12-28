<?php
include 'connect.php';


$HotelID=$_POST['HotelID'];
$NAME=$_POST['NAME'];
$DESC=$_POST['DESC'];
$PATH=$_POST['PATH'];













$sql2 = "INSERT INTO `Facilities`( `Hotel_ID`, `Name`, `Descr`) VALUES ('$HotelID','$NAME','$DESC');";
if ($conn->query($sql2) === TRUE) {
    $sql2 = "SELECT `ID` FROM `Facilities` WHERE Facilities.Hotel_ID='$HotelID' AND Facilities.Name='$NAME' ;";



    $result = $conn->query($sql2);


if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
    $i=$row['ID'];
      $sql2="INSERT INTO `FacilitiesImage`(`FacID`, `PATH`) VALUES ($i,'$PATH')";
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
}else{
   echo "0".$conn->error;
}




$conn->close();

?>