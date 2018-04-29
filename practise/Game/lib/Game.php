<?php
class Game {

	public $queue = array();

	//Type Casting
	public function join(Animal $animalObj) {
		$this->queue[] = $animalObj;
	}

	public function gameStart(){

		foreach($this->queue as $v) {
			$v->speak();
			echo "<br/>";			
			$v->prepare();
		}

		echo "<br/>";

		if($this->queue[0]->speed < $this->queue[1]->speed) {

			echo $this->queue[1]->name." wins! ";

		} else if ($this->queue[0]->speed > $this->queue[1]->speed) {

			echo $this->queue[0]->name." wins! ";

		} else {

			echo "Draw";
		}

		echo $this->queue[0]->kind.":".$this->queue[0]->speed." vs ".$this->queue[1]->kind.":".$this->queue[1]->speed;


	}

}
?>