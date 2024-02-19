<?php

require "../../bootstrap.php";

$issuer = "http://contactos.local";

$credenciales = [
    'usuario' => 'admin',
    'password' => 'admin'
];

$token = obtainToken($credenciales, $issuer);
echo "Token obtenido: $token\n";

$contacto = [
    'nombre' => 'Nuevo nombre',
    'apellidos' => 'Nuevos apellidos',
    'telefono' => '987654321',
    'email' => 'rnada@correo.es'
];

$addContacto($token, $issuer,$contacto);

$delContacto($token, 2);

$uri = $issuer . "/login";

$ch = curl_init($uri);

curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $token
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($credenciales));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

$response = json_decode($response, true);
if (!isset($response['jwt'])) {
    exit('Failed, exiting');
}

echo "Token OK\n";

return $response['jwt'];

function obtainToken($credenciales, $issuer)
{
    $uri = $issuer . "/login";

    $ch = curl_init($uri);

    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $uri
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($credenciales));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    $response = json_decode($response, true);
    if (!isset($response['jwt'])) {
        exit('Failed, exiting');
    }

    echo "Token OK\n";

    return $response['jwt'];
}


function addContacto($token, $issuer, $contacto)
{
    $uri = $issuer . "/contactos";

    $ch = curl_init($uri);

    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contacto));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    $response = json_decode($response, true);
    if (!isset($response['jwt'])) {
        exit('Failed, exiting');
    }

    echo "Token OK\n";

    return $response['jwt'];
}

function delContacto($token, $issuer, $id)
{
    $uri = $issuer . "/contactos/$id";

    $ch = curl_init($uri);

    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contacto));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    $response = json_decode($response, true);
    if (!isset($response['jwt'])) {
        exit('Failed, exiting');
    }

    echo "Token OK\n";

    return $response['jwt'];
}
