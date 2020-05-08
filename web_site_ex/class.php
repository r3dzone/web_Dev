<?
header('Content-Type: text/html; charset=UTF-8');

class junior{
	var $name,$gender,$age;
	
	function Prints(){
		echo "이름 :".$this -> name."</br>";
		echo "성별 :".$this -> gender."</br>";
		echo "나이 :".$this -> age."</br>";
	}
	
	function Print1(){
		print_r($this);
	}
}	
	$object = new junior;
	$object -> name ="노시은";
	$object -> gender ="여";
	$object -> age ="21";
	$object -> Prints();
	
	$object1 = new junior;
	$object1 -> name ="박승현";
	$object1 -> gender ="남";
	$object1 -> age ="18";
	$object1 -> Print1();

?>
