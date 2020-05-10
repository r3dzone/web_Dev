<?php
		include("./silsup2-1.php");//정규식
		require("./silsup2-2.php");//더해주기
		$a = $_GET['a'];
		$b = $_GET['b'];
		if(test($a,$b)){
		echo "합은 ".hap($a,$b)." 입니다.";
		}
	
?>
<html>
<script>
</script>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
			<form method="GET" action="">
			<input type="text" name="a">
			<input type="text" name="b">
			<input type="submit" name="submit" value ="submit" >
			</form>
			
	</body>
</html>
