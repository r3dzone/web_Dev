<?php
		include("./include.php");
		require("./require.php");
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = sum($a,$b);
		echo $var."'s sum function";
		if($_GET['submit']!=NULL)
				printf("<br>%d + %d = %d",$a,$b,$c);
else{
	?>
	<form method="GET" action="">
	<input type="text" name="a">
	<input type="text" name="b">
	<input type="submit" name="submit" value ="submit" >
	</form>
	<?
}		
?>
