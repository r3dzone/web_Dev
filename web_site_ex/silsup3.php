<?php
		$str = $_GET['str'];

		if(ereg("^.+\@.+\..+$",$str)){
			echo "정규식을 만족합니다.";
		}else{
			echo "정규식을 만족하지 않습니다.";
			
		}
?>

<html> 
<head> 
<title></title> 
<meta charset = "utf-8">
<script language="javascript"> 

</script> 
</head> 
<body> 
<form method="GET" action="">
<input type="text" name ="str">
<input type="submit" value ="입력">
</form>
</body> 
</html> 
