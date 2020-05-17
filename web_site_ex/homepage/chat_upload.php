<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$mesg = $_POST["mesg"];

$err = 0;

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");

if(isset($_POST["mesg"])&& $err !=3 ){
	$query = "insert into chat(mesg,nick) values('".$mesg."','".$nick."');"; 
	$result = mysqli_query($conn, $query);
	
}
mysqli_close($conn);
echo '<script>location.href="/chat.php"</script>';
?>
