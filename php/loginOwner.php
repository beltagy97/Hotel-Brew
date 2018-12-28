<?php
include 'connect.php';

$EMAIL=$_POST['EMAIL'];
$passWORD=$_POST['PASS'];
$PASS=md5($passWORD);

$sql = "SELECT ID FROM Owners WHERE EMAIL='$EMAIL' AND PASS='$PASS' ";
$result = $conn->query($sql);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
     	 $stringTest = $row['ID'];
      	 echo $stringTest;
	}
}else{

	echo 0;
}

// now all the rows have been fetched, it can be encoded


?>