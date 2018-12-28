<?php
include 'connect.php';

$EMAIL=$_POST['EMAIL'];
$PASS=$_POST['PASS'];


$sql = "SELECT * FROM Admin WHERE EMAIL='$EMAIL' AND Pass='$PASS' ";
$result = $conn->query($sql);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
   
}


if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
      	 echo 1;
	}
}else{

	echo 0;
}



?>