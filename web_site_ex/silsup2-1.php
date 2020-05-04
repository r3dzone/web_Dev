<?php
		function test($a , $b)
		{	
			$s = 1;
			if(!ereg("^[[:digit:]]{1,1}$",$a))
				{echo $a."는 0부터 9까지의 숫자가 아닙니다. </br>";
			$s =  0;
			}
		    if(!ereg("^[[:digit:]]{1,1}$",$b))
				{echo $b."는 0부터 9까지의 숫자가 아닙니다. </br>";
				$s =  0;}
			
		if($s == 0){
		return 0;
		}return 1;
		}
?>
