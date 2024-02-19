<?php

/*Carga en dos variables enviados por la URL 
$n1 = 5
$n2 = 3

*/

// Recuperamos los datos de la petición
$n1 = $_GET['x'];
$n2 = $_GET['y'];

// Creamos el mensaje SOAP
$msgSoap = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Add xmlns="http://tempuri.org/">
      <intA>{$n1}</intA>
      <intB>{$n2}</intB>
    </Add>
  </soap:Body>
</soap:Envelope>
EOD;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.dneonline.com/calculator.asmx?op=Add",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_POSTFIELDS => $msgSoap,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "content-type: text/xml; charset=utf-8",
    "soapaction: http://tempuri.org/Add"
  )
));

$response = curl_exec($curl);
curl_close($curl);
$matches = array();
preg_match('/<AddResult>(.*)<\/AddResult>/', $response, $matches);
echo $n1. ' + '.$n2.' = '.$matches[1].PHP_EOL;