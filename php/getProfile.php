<?php
include 'connect.php';

$CustID = (int)$_POST['custID'];

$sql = "SELECT customer.EMAIL , customer.TYPE , customer.Name FROM customer WHERE customer.ID =$CustID";

$result = $conn->query($sql);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}

$rows = array();

while($r = $result->fetch_assoc()){


    $rows[] =  $r;
}


echo json_encode($rows);

?>