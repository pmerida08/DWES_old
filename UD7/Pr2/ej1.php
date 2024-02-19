<?php

$lista_paises = [];

$client = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");

$lista_paises = $client->ListOfCountryNamesByName();

for ($i=0; $i < count($lista_paises->ListOfCountryNamesByNameResult->tCountryCodeAndName); $i++) { 
    echo    $lista_paises->ListOfCountryNamesByNameResult->tCountryCodeAndName[$i]->sName."<br>";
}

