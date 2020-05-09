<?php
session_start();
$id =$_SESSION['id'];

$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
	
$query = "delete from pinfo where id='".$id."'";
$result = mysql_query($query, $conn);
unset($_SESSION['id']);
	echo "<script>alert('success for delete your data')</script>";
	echo '<script>location.href="http:///~unknown/homepage/main.php"</script>';
?>

			 
