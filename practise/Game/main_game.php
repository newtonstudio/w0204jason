<?php
//include "Animal.php";
//include "Rabbit.php";
//include "Tortoise.php";
//include "Game.php";

function __autoload($classname) {
	include "lib/".strtolower($classname).".php";
}


	$bob 	= new Tortoise("Bob");
	$roger 	= new Rabbit("Roger");

	$game   = new Game();
	$game->join($bob);
	$game->join($roger);

	$game->gameStart();


?>