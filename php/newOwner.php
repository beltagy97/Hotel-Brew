<?php
include 'connect.php';


$EMAIL=$_POST['EMAIL'];
$NAME=$_POST['NAME'];
$passWORD=$_POST['PASS'];
$PASS=md5($passWORD);




$sql2 = "INSERT INTO `Owners`( `NAME`, `EMAIL`, `PASS`) VALUES ('$NAME','$EMAIL','$PASS')";
if ($conn->query($sql2) === TRUE) {
    echo "1";
} else {
    echo "0";
}

$conn->close();

?>