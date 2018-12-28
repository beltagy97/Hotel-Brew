<?php
include 'connect.php';


$NAME=$_POST['NAME'];
$EMAIL=$_POST['EMAIL'];
$passWORD=$_POST['PASS'];
$PASS=md5($passWORD);





$sql2 = "INSERT INTO `customer`( `EMAIL`, `PASS`, `TYPE`,`Name`) VALUES ('$EMAIL','$PASS',0,'$NAME')";
if ($conn->query($sql2) === TRUE) {
    echo "1";
} else {
    echo "0";
}

$conn->close();

?>