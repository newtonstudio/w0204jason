<?php
class Animal {
	//properties
	public $furColor;
	public $name;


	//methods
	public function shout(){
		echo "Argh.......";
	}

	public function move(){
		echo "(move....)";
	}

	//private
	protected function heart(){
		echo "(dup,dup,dup)";	
	}

	//protected
	protected function jump(){
		echo "(jumping jumping, everybody)";
	}	
}
?>