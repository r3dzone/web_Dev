<?php
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
	
$conn = mysqli_connect($dbHost,$dbId,$dbPw);

if($conn)
		echo "db connected"."</br>";
else 
		echo "db failed"."</br>";

mysql_select_db($dbName,$conn);
	
	$res = mysqli_query('select * from new_member');
	
	while($row=mysqli_fetch_array($res)){
	
	echo "<pre>";
	print_r($row);
	echo "<pre>";
	
}
	
	mysqli_close($conn);



?>
