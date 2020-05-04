<?php

$num1 = $_POST['post'];
$c = 0;

for($c=1; $c < 10; $c++ ){
echo $num1."X".$c."=".$num1*$c."</br>";

}


?>
<html>
	<head>
        <meta charset="UTF-8">
	<title>gugudan</title>
	</head>
	 <body>
	 <form method="POST" action="">
	 <input type="text" name="post">
	 <input type="submit" value ="입력">
	 </form>	 
	 </body>
</html>
