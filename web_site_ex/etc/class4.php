<?
header('Content-Type: text/html; charset=UTF-8');

class Mom{
	public $name,$age,$gender;
	
	function Mom($n,$a,$g){
		$this -> name = $n;
		$this -> age = $a;
		$this -> gender = $g;
	}
	function __destruct(){
		echo "부모 소멸자"."</br>";
	}
}
	class Son extends Mom{
		function info(){
		echo $this -> name."</br>";
		echo $this -> age."</br>";
		echo $this -> gender."</br>";
	}
	function __destruct(){
		parent::__destruct();
		print "자식 소멸자"."</br>";
	}
}
	
	$object = new Son("Mommy","40","FM");
	$object -> info();

?>
