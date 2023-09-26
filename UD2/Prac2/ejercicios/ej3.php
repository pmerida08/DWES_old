<?php

$radio = 4;
define("PI", pi());

$area = PI * pow($radio, 2);
$longitud = 2 * PI * $radio;

print("<p>");
echo("Con un radio de ". $radio);
print("</p>");
print("<p>");
echo("El area del circulo es ". $area ." y la longitud es de ". $longitud);
print("</p>");