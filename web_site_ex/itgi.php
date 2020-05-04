<?php
    session_start();
	$count = $_POST['count']; 
	$str = $_POST['post'];// 문자
	$a   = mb_strlen($str, 'UTF-8')-1; //마지막 문자 시작점
	$c   = mb_substr($str, $a ,1, 'UTF-8');//단어 맨 끝
	$s = mb_substr($str, 0 ,1, 'UTF-8');//단어 시작
	$strs = $_POST['str'];//이전 문자들
	
	#echo $strs; 
		if($_SESSION['continue']==1){
	$strs = $_SESSION['str'];
	echo "save 성공!!";
	$b = 1;
	unset($_SESSION['continue']);
    }
    if($_SESSION['continue'] == 2){
    $strs = $_SESSION['str'];
		echo "load 성공!!"; 
			$b = 1;
      unset($_SESSION['continue']);
     }
     

	if(isset($count)&&$b !=1)
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
                              	echo '<script>location.href="http://junior.catsecurity.net/~unknown/itgi.php"</script>';			
	  		}
		}
	}
	else if($b != 1)
	{
		$strs = $str;
		echo "시작입니다.";
	}
	
	if($b == 1){
		echo $strs;
		$b = 0;
		$c = $_SESSION['a'];
		$count ++;
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
			
			<form method="POST" action="itgisave.php">
			<input type="hidden" name="salo" value="1">
            <input type="hidden" name="a" value ="<?=$c?>">
			<input type="hidden" name="str" value ="<?=$strs?>">
			<input type="hidden" name="count" value ="<?=$count?>">
			<input type="hidden" name="salo" value="1">
			<input type="submit" value ="save">
            </form> 

            <form method="POST" action="itgisave.php">
			<input type="hidden" name="salo" value="2">
            <input type="submit" value ="load">
            </form> 			
			
	</body>
	
</html>
