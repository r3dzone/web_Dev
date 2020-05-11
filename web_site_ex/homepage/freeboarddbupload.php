<?php
session_start();

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);
$file = $_FILES['uploadfile'];

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");

if($_POST["contentname"]!="" && $_POST["content"]!=""){
$query = "insert into fboard_content(contentname,content,secret,attach,nickname,id) values('".$_POST["contentname"]."','".$_POST["content"]."','".$_POST["secret"]."','".$file['name']."','".$_SESSION['nick']."','".$_SESSION['id']."')";

$result = mysqli_query($conn,$query);

if($result) echo "Input Success<br>";
	else echo "Input Failed<br>";
	
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
mysqli_close($conn);
	echo '<script>location.href="/freeboard.php"</script>';
	?>
