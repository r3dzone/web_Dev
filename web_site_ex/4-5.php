<?php
$a = "CAT-Security";
$b = "CAT-CERT";

if(ereg($a,"CAT-Security")){
	echo "ereg : cat in".$a."</br>";
}
if(eregi($a,"CAT-Security")){
	echo "eregi : cat in".$a."</br>";
}
	$a = ereg_replace("cat-security",$b,$a);
	echo "ereg_replace : ".$a."</br>";

	$a = eregi_replace("cat-security",$b,$a);
	echo "eregi_replace : ".$a."</br>";
?>