<?php
session_start();
echo "<script>alert('success upload!!')</script>";
echo "cn".$_POST["contentname"]."</br>ct".$_POST["content"]."</br>se".$_POST["secret"]."</br>fl".$file['name']."</br>ni".$_SESSION['nick'];

$kn = $_POST['idx'];
$dbHost = '';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

$file = $_FILES['uploadfile'];

mysqli_query("set session character_set_connection=utf8;");
mysqli_query("set session character_set_results=utf8;");
mysqli_query("set session character_set_client=utf8;");

if(isset($_POST["contentname"]) && isset($_POST["content"])){
	

$query = "update fboard_content set contentname = '".$_POST["contentname"]."' where idx =".$idx.";";
$result = mysqli_query($conn,$query);

$query = "update fboard_content set content = '".$_POST["content"]."' where idx =".$idx.";";
$result = mysqli_query($conn,$query);

$query = "update fboard_content set secret = '".$_POST["secret"]."' where idx =".$kn.";";
$result = mysqli_query($conn,$query);


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
