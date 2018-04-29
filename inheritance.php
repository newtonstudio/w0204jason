<?php
include "Animal.php";
include "Tiger.php";

//instantiate 实例化
$t = new Tiger();
$a = new Animal();

$t->move();
echo "<br/>";
$t->shout();
echo "<br/>";
$t->showMuscle();








?>