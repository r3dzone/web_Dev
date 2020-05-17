<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$idx = $_POST["idx"];

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");

if($_POST['submit']=='좋아요'){
	$query = "update fboard_contentinfo set likey = '1' where contentn='".$idx."' AND visitor = '".$id."'";
	$result = mysqli_query($conn,$query);
}else{ 
	$query = "update fboard_contentinfo set likey = '2' where contentn='".$idx."' AND visitor = '".$id."'";
	$result = mysqli_query($conn,$query);
}

mysqli_close($conn);

echo '<script>location.href="/read.php?idx='.$idx.'"</script>';
	?>
