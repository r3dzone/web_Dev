<?php
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';

$conn = mysql_connect($dbHost,$dbId,$dbPw);
if($conn)
		echo "db connected";
else 
		echo "db failed";
	mysql_close($conn);



?>