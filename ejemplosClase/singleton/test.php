<?php
include("Animales.php");

$datos = array("nombre" => "Morsa", "peso" => 9);

echo "Clases sin instanciar<br>";

$sh_sing1 = Animales::getInstancia();

$datos = $sh_sing1->get(6);

var_dump($datos);

$add = $sh_sing1->set('gato');
