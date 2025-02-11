<?php

use App\Core\Router;
use App\Controllers\AnimalesController;

require_once "../bootstrap.php";


session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "invitado";
    $_SESSION['usuario'] = [
        "name" => "Invitado",
        "surname" => "",
        "photo" => "",
        "categoria" => "",
        "email" => "",
        "resumen" => "",
        "visible" => "",
        "updated_at" => ""
    ];
}

$router = new Router();
$router->add(
    [
        "path" => "/^\/$/",
        "action" => [AnimalesController::class, "IndexAction"],
        "auth" => ["invitado", "usuario", "admin"]
    ]
);

$request = $_SERVER['REQUEST_URI']; // Recoje URL
$route = $router->match($request); // Busca en todas las rutas hasta encontrar cual coincide con la URL

if ($route) {
    if (in_array($_SESSION['perfil'], $route['auth'])) {
        $className = $route['action'][0];
        $classMethod = $route['action'][1];
        $object = new $className;
        $object->$classMethod($request);
    } elseif ($_SESSION['perfil'] != "invitado") {
        header("Location: /");
    } else {
        header("Location: /login");
    }
} else {
    exit(http_response_code(404));
}
