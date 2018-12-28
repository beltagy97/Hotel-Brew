<?php
include 'connect.php';


$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}
$rows = array();

while($r = $result->fetch_assoc()){


    $rows[] =  $r;
}

// now all the rows have been fetched, it can be encoded
echo json_encode($rows);

?>