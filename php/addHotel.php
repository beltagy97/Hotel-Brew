<?php
include 'connect.php';


$Country=$_POST['COUNTRY'];
$CITY=$_POST['CITY'];
$STREET=$_POST['STREET'];
$HOTELNAME=$_POST['HOTELNAME'];
$STARS=(int)$_POST['STARS'];
$OWNERID=$_POST['OWNERID'];
$TYPE=(int)$_POST['TYPE'];











$sql2 = "INSERT INTO `Location` SET Location.Country='$Country', Location.City='$CITY',Location.Street='$STREET'";
if ($conn->query($sql2) === TRUE) {
    $sql2 = "SELECT `ID` FROM `Location` WHERE Location.Country='$Country' AND Location.City='$CITY' AND Location.Street='$STREET'";



    $result = $conn->query($sql2);


if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
    $i=$row['ID'];
      $sql2="INSERT INTO `Hotel` SET Hotel.HNAME='$HOTELNAME', Hotel.STARS=$STARS,Hotel.Owner_ID=$OWNERID,Hotel.TYPE=$TYPE,Hotel.Location=$i";
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