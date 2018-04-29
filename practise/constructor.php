<?php
class Apple {

	public function __construct(){
		echo "Hello...";
	}

	public function old(){
		echo "(old....)";
	}

	public function __destruct(){
		echo "oh.iam die...";
	}

}

$a = new Apple();
unset($a);
echo "Middle <br/>";


?>