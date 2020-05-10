<?php
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';

$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);
if($a)
		echo $dbName;
else 
		echo "nope";
	
	mysql_close($conn);



?>