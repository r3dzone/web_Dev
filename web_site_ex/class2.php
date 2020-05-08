<?
header('Content-Type: text/html; charset=UTF-8');

class test{
	public $name = "Jinwoo";
	private $age = "21";
	protected $grade = "2";
	
	function Print1(){
		echo "이름 :".$this -> name."</br>";
		echo "학년 :".$this -> grade."</br>";
		echo "나이 :".$this -> age."</br>";
	}
}
	class kid extends test{
		function Print2(){
		echo "이름 :".$this -> name."</br>";
		echo "학년 :".$this -> grade."</br>";
		echo "나이 :".$this -> age."</br>";
	}
}
	
	$object = new kid;
	$object -> Print1();
	
	$object1 = new test;
	$object1 -> Print2();

?>
