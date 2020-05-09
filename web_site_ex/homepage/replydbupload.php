<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$replyns = $_POST["replyn"];
$kn = $_POST["kn"];

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

if($replyns == ""){
$query = "insert into reply(contentn,reply,secret,writer,rereply) values('".$kn."','".$_POST["reply"]."','".$_POST["secret"]. "','".$nick."',LAST_INSERT_ID()+1)"; 
$result = mysql_query($query, $conn);
$last = mysql_insert_id();
$query = "update reply set rereply = '".$last."' where replyn =".$last;
$result = mysql_query($query, $conn);
}else{
	$query = "insert into reply(contentn,reply,secret,writer,rereply) values('".$kn."','".$_POST["reply"]."','".$_POST["secret"]. "','".$nick."',LAST_INSERT_ID()+1)"; 
	$result = mysql_query($query, $conn);
	$last = mysql_insert_id();
	$query = "update reply set rereply = '".$replyns."' where replyn =".$last;
	$result = mysql_query($query, $conn);
	}

}
mysql_close($conn);

echo '<script>location.href="http:///~unknown/homepage/read.php?kn='.$kn.'"</script>';

	?>
