<?php
		$str = $_GET['str'];
		if(ereg("^cert$",$str)){
			echo "정규식을 만족합니다.";
			
		}else{
			echo "정규식을 만족하지 않습니다.";
			
		}
?>