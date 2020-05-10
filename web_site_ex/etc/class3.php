<?
header('Content-Type: text/html; charset=UTF-8');

class Mom{
	public $gear,$price,$wheel;
	
	function __construct(){
				echo "부모 클래스 생성자"."</br>";
	}
	function __destruct(){
				echo "부모 소멸자"."</br>";
	}
}
	class Son extends Mom{
		public $num,$sum;
		function __construct(){
		parent::__construct();
		print "자식 클래스 생성자"."</br>";
	}
	function __destruct(){
		parent::__destruct();
		print "자식 소멸자"."</br>";
	}
}
	
	$object = new Mom;
	$object = new Son;

?>