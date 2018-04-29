<?php
class Tiger extends Animal {

	private function showMuscle() {
		echo "(ting.....)";
	}

	//override
	public function move(){
		$this->heart();
		$this->jump();
		$this->showMuscle();
		echo "(tiger move....)";
	}

}
?>