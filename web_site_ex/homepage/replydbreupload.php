<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];

echo $_POST["reply"];
$idx = $_POST["idx"];
$replyn = $_POST["replyn"];

$err = 0;

if($_POST["reply"]==""){
echo "<script>alert('empty!!')</script>";
echo '<script>location.href="/read.php?idx='.$idx.'"</script>';
$err = 3;
}

echo "<script>alert('success upload!!')</script>";
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");

if(isset($_POST["reply"])&& $err !=3 ){
	
$query = "update reply set secret = '".$_POST["secret"]."' where replyn =".$replyn.";";
$result = mysqli_query($conn,$query);

$query = "update reply set reply = '".$_POST["reply"]."' where replyn =".$replyn.";";
$result = mysqli_query($conn,$query);

}
mysqli_close($conn);

echo '<script>location.href="/read.php?idx='.$idx.'"</script>';

	?>
