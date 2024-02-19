<?php
use App\Models\Contactos;
require "../../bootstrap.php";

$contactos = new Contactos;
$contactos = Contactos::getInstancia();
$contactos->get(11);
$result = $contactos->get(11);
echo $result;
