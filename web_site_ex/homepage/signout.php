<?php
session_start();
$id =$_SESSION['id'];
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	
$query = "delete from user_info where id='".$id."'";
$result = mysqli_query($conn,$query);
unset($_SESSION['id']);
	echo "<script>alert('success for delete your data')</script>";
	echo '<script>location.href="http://hypertime.tk/main.php"</script>';
?>

			 
