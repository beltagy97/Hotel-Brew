<?php


// Start the session
session_start();
unset($_SESSION["hotelID"]);
$_SESSION["hotelID"] = $_GET['hotelID'];

header("Location:Hotelinfo.php");
die();

?>