<?php
require_once("Contador.php");


$alberto = new Contador();

$alberto->count();
$alberto->count();
$alberto->count();

$alberto2 = new Contador();
$alberto2->count();
$alberto2->count();

echo(Contador::countInstance() ."");
echo($alberto->count());
echo($alberto2->count());
?>