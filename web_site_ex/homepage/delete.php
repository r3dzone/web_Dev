<?php
session_start();
echo "<script>alert('success delete!!')</script>";

$replyn = $_GET['replyn'];
$kn = $_GET['kn'];
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);
$file = $_FILES['uploadfile'];

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

if($replyn==""){
$query = "delete from hpcontent where kn =".$kn;
$result = mysql_query($query, $conn);
$query = "delete from reply where contentn ='".$kn."'";
$result = mysql_query($query, $conn);

mysql_close($conn);
echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/freeboard.php"</script>';
}else{

echo "<script>alert('reply deleted!!')</script>";	
echo "<script>alert('".$replyn.$kn."')</script>";	
$query = "delete from reply where replyn ='".$replyn."'";
$result = mysql_query($query, $conn);

mysql_close($conn);
echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/read.php?kn='.$kn.'"</script>';
}	
	
	?>
