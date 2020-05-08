<?php
session_start();
echo "<script>alert('success upload!!')</script>";
echo "cn".$_POST["contentname"]."</br>ct".$_POST["content"]."</br>se".$_POST["secret"]."</br>fl".$file['name']."</br>ni".$_SESSION['nick'];

$kn = $_POST['kn'];
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

if(isset($_POST["contentname"]) && isset($_POST["content"])){
	

$query = "update hpcontent set contentname = '".$_POST["contentname"]."' where kn =".$kn;
$result = mysql_query($query, $conn);

$query = "update hpcontent set content = '".$_POST["content"]."' where kn =".$kn;
$result = mysql_query($query, $conn);

$query = "update hpcontent set secret = '".$_POST["secret"]."' where kn =".$kn;
$result = mysql_query($query, $conn);


echo $file['name']."</br>";
echo $file['tmp_name']."</br>";
$path = "./upload/";
if(isset($file)){
	if(move_uploaded_file($file['tmp_name'],$path.$file['name'])){
		echo "upload success";
	}else{
		
		echo "upload fail";
	}
	}
	
}
mysql_close($conn);
	echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/freeboard.php"</script>';
	?>
