<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];

echo $_POST["reply"];
$kn = $_POST["kn"];
$replyn = $_POST["replyn"];

$err = 0;

if($_POST["reply"]==""){
echo "<script>alert('empty!!')</script>";
echo '<script>location.href="http:///~unknown/homepage/read.php?kn='.$kn.'"</script>';
$err = 3;
}

echo "<script>alert('success upload!!')</script>";
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

if(isset($_POST["reply"])&& $err !=3 ){
	
$query = "update reply set secret = '".$_POST["secret"]."' where replyn =".$replyn;
$result = mysql_query($query, $conn);

$query = "update reply set reply = '".$_POST["reply"]."' where replyn =".$replyn;
$result = mysql_query($query, $conn);

}
mysql_close($conn);

echo '<script>location.href="http:///~unknown/homepage/read.php?kn='.$kn.'"</script>';

	?>
