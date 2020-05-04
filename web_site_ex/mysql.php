<?php
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
	
$conn = mysql_connect($dbHost,$dbId,$dbPw);

if($conn)
		echo "db connected".'</br>';
else 
		echo "db failed".'</br>';

mysql_select_db($dbName,$conn);
	
	$res = mysql_query('select * from new_member');
	
	while($row=mysql_fetch_array($res)){
	
	echo "<pre>";
	print_r($row);
	echo "<pre>";
	
}
	
	mysql_close($conn);



?>