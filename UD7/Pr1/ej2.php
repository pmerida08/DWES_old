<?php
$n1 = $_GET['x'];
$n2 = $_GET['y'];

$client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");

echo $n1. ' + '.$n2.' = '.$client->Add(array('intA' => $n1, 'intB' => $n2))->AddResult.PHP_EOL;