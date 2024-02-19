<?php

ini_set('soap.wsdl_cache_enabled', '0'); // Deshabilitamos la caché de WSDL

$client = new SoapClient('http://localhost/DWES/UD7/server_soap/Pr2/greetings.wsdl');
echo $client->sayHello('Pablo').'<br>';
echo $client->sayGoodbye('Pablo');