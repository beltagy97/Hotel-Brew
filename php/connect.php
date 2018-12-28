<?php
$servername = "localhost";
$username = "";
$password = "";
$db_name= "HotelAppDb";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>