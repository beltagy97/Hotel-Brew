<?php
include 'connect.php';

$HID=(int)$_POST['HID'];
$sql2 = "UPDATE Hotel
	SET Suspended = 0
	WHERE Hotel.ID = $HID";
if ($conn->query($sql2) === TRUE) {
    echo "1";
} else {
    echo "0".$conn->error;
}

$conn->close();

?>