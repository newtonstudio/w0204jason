<?php
class Hero {

	public function fly(){

	}

	public static function power(){
		echo "POWER....";
	}

}

interface IHero {
	public function fly();
	public function power();
}

interface IHuman {
	public function speak();
	public function walk();
}


class Peanuthero implements IHero, IHuman {
	public function fly(){
		echo "(Fly...)";
	}

	public function power(){
		echo "(Power...)";
	}

	public function speak(){
		echo "(speak...)";
	}

	public function walk(){
		echo "(Walk...)";
	}

}  

$abc = new Peanuthero();

$abc->fly();
$abc->power();
$abc->speak();
$abc->walk();


Hero::power();

?>