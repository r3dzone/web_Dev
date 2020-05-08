<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$kn = $_POST["kn"];

$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

if($_POST['submit']=='좋아요'){
	$query = "update contentinfo set good = '1' where kn='".$kn."' AND visitor = '".$nick."'";
	$result = mysql_query($query, $conn);
}else{ 
	$query = "update contentinfo set good = '2' where kn='".$kn."' AND visitor = '".$nick."'";
	$result = mysql_query($query, $conn);
}

mysql_close($conn);

echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/read.php?kn='.$kn.'"</script>';
	?>
