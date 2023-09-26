<?php

$str = "Hola";
$int = 3;
$db = 3.14;
$bool = TRUE;
$null = NULL;

print("<p>");
printf("Valor es %s", gettype($str));
print("</p>");
print("<p>");
printf("Valor es %s", gettype($db));
print("</p>");
print("<p>");
printf("Valor es %s", gettype($bool));
print("</p>");
print("<p>");
printf("Valor es %s", gettype($int));
print("</p>");
print("<p>");
printf("Valor es %s", gettype($null));
print("</p>");
