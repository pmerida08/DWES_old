<?php

$client = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
$cont = $_GET['continentes'];
$paises = $client -> ListOfCountryNamesGroupedByContinent();


$paisesLista = $paises -> ListOfCountryNamesGroupedByContinentResult -> tCountryCodeAndNameGroupedByContinent;


$selectedContinentInfo = null;
foreach ($paisesLista as $continentInfo) {
    if ($continentInfo->Continent->sCode == $cont) {
        $selectedContinentInfo = $continentInfo;
    }
}

$continentName = $selectedContinentInfo->Continent->sName;
echo "<h1> Países de " . $continentName . "</h1>";


foreach ($selectedContinentInfo->CountryCodeAndNames->tCountryCodeAndName as $country) {
    echo "<li>{$country->sName} ({$country->sISOCode})</li>";
}

echo "<br><br><a href='select.php'>Volver</a>"
?>