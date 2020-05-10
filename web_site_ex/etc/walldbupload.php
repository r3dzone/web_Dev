<?php
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

echo $_POST["name"]."</br>";
echo $_POST["content"]."</br>";

if(isset($_POST["name"]) && isset($_POST["content"])){
$query = "insert into wall(name,content,download) values('".$_POST["name"]."','".$_POST["content"]."','".$file['name']."')";

$result = mysql_query($query, $conn);

if($result) echo "Input Success<br>";
	else echo "Input Failed<br>";
	
echo $file['name']."</br>";
echo $file['tmp_name']."</br>";
$path = "./upload/";
if($_POST['submit'] == "submit"){
	if(move_uploaded_file($file['tmp_name'],$path.$file['name'])){
		echo "upload success";
	}else{
		
		echo "upload fail";
	}
	}
	
}
mysql_close($conn);
	echo '<script>location.href="http:///~unknown/wall.php"</script>';
	?>
