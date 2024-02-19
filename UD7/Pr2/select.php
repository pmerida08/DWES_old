<?php

$client = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");

$lista = [];

$lista = $client -> ListOfContinentsByName();

echo "<h1>Selecciona un continente</h1>";
echo "<form action='show_cont.php' method='GET'>";
echo "<select name='continentes'>";
for ($i = 0; $i < count($lista->ListOfContinentsByNameResult->tContinent); $i++) {
    echo "<option value='" . $lista->ListOfContinentsByNameResult->tContinent[$i]->sCode . "'>" . $lista->ListOfContinentsByNameResult->tContinent[$i]->sName . "</option>";
}
echo "</select><br><br>";
echo "<input type='submit' value='Enviar'>";
echo "</form>";
?>