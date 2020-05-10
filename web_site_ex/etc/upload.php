<html>
	<head>
	<meta charset="UTF-8">
		<title></title>
		<style>
		
		 </style>
	</head>
	<body>
	  <form method="POST" action="" enctype="multipart/form-data">
			<input type="file" name="uploadfile"/>
			<input type="submit" name="upload" value="upload"/>	
		</form>
		
	</body>

</html>

<?
$file = $_FILES['uploadfile'];
echo $file['name']."</br>";
echo $file['tmp_name']."</br>";
$path = "./upload/";
if($_POST['upload'] == "upload"){
	if(move_uploaded_file($file['tmp_name'],$path.$file['name'])){
		echo "upload success";
	}else{
		
		echo "upload fail";
	}
	
	
}

?>
			 
