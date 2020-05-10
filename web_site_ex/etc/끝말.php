<?php
	$count = $_POST['count']; 
	$str = $_POST['post'];// 문자
	$a   = mb_strlen($str, 'UTF-8')-1; //마지막 문자 시작점
	$c   = mb_substr($str, $a ,1, 'UTF-8');//단어 맨 끝
	$s = mb_substr($str, 0 ,1, 'UTF-8');//단어 시작
	$strs = $_POST['str'];//이전 문자들
	
	#echo $strs; 
     
	if(isset($count))
	{
		if($count <= 1)
		{
			echo $str;
			$strs = $strs.$str;
		}
		else
		{
			$t = $_POST['a'];//이전 문자의 끝
				
			if($s == $t)
			{
				$strs = $strs."--".$str;
				echo $strs;
	  		}
			else
			{
	    			echo "<script>alert('틀렸습니다. 돌아갑니다')</script>";
                              	echo '<script>location.href="http:///~unknown/끝말.php"</script>';			
	  		}
		}
	}
	else
	{
		$strs = $str;
		echo "시작입니다.";
	}

	$count ++;
?>

<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
			<form method="POST" action="">
			<input type="text" name="post">
			<input type="submit" value ="입력">
			<input type="hidden" name="a" value ="<?=$c?>">
			<input type="hidden" name="str" value ="<?=$strs?>">
			<input type="hidden" name="count" value ="<?=$count?>">
			</form>
	</body>
	
</html>
