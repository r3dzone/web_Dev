<?php
session_start();
echo "<script>alert('success delete!!')</script>";

$replyn = $_GET['replyn'];
$idx = $_GET['idx'];
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);
$file = $_FILES['uploadfile'];

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");

if($replyn==""){
$query = "delete from fboard_content where idx =".$idx;
$result = mysqli_query($conn,$query);
$query = "delete from fboard_reply where contentn ='".$idx."'";
$result = mysqli_query($conn,$query);

mysqli_close($conn);
echo '<script>location.href="/freeboard.php"</script>';
}else{

echo "<script>alert('reply deleted!!')</script>";	
echo "<script>alert('".$replyn.$idx."')</script>";	
$query = "delete from fboard_reply where replyn ='".$replyn."'";
$result = mysqli_query($conn,$query);

mysqli_close($conn);
echo '<script>location.href="/read.php?idx='.$idx.'"</script>';
}	
?>
