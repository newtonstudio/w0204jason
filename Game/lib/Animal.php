<?php
class Animal {

	public $kind;
	public $name;
	public $speed;

	public function __construct($name){
		$this->name = $name;
	}

	public function speak(){
		echo $this->kind.": Hello, My Name is ".$this->name;
	}

	public function prepare(){
		$this->speed = rand(1,100);
	}

}
?>