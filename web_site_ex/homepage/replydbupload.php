<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$replyns = $_POST["replyn"];
$idx = $_POST["idx"];

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

if($replyns == ""){
$query = "insert into reply(contentn,reply,secret,writer,rereply) values('".$idx."','".$_POST["reply"]."','".$_POST["secret"]. "','".$nick."',LAST_INSERT_ID()+1)"; 
$result = mysqli_query($conn,$query);
$last = mysqli_insert_id();
$query = "update reply set rereply = '".$last."' where replyn =".$last;
$result = mysqli_query($conn,$query);
}else{
	$query = "insert into reply(contentn,reply,secret,writer,rereply) values('".$idx."','".$_POST["reply"]."','".$_POST["secret"]. "','".$nick."',LAST_INSERT_ID()+1)"; 
	$result = mysqli_query($conn, $query);
	$last = mysqli_insert_id();
	$query = "update reply set rereply = '".$replyns."' where replyn =".$last;
	$result = mysqli_query($conn,$query);
	}

}
mysqli_close($conn);

echo '<script>location.href="/read.php?idx='.$idx.'"</script>';

	?>
