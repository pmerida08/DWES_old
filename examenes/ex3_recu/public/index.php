<?php
require_once "../bootstrap.php";
include("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\AdminController;
use App\Controllers\MultasController;

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
}

$router = new Router();

$router->add([
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [AdminController::class, 'IndexAction'],
    'auth' => ['invitado', 'agente', 'conductor', 'admin'] //cambiar
]);

$router->add([
    'name' => 'login',
    'path' => '/^\/login$/',
    'action' => [AdminController::class, 'LoginAction'],
    'auth' => ['invitado']
]);

$router->add([
    'name' => 'login',
    'path' => '/^\/logout$/',
    'action' => [AdminController::class, 'LogoutAction'],
    'auth' => ['agente', 'conductor', 'admin']
]);

$router->add([
    'name' => 'multas',
    'path' => '/^\/multas\/\d+$/',
    'action' => [MultasController::class, 'MultasAction'],
    'auth' => ['conductor', 'admin']
]);

$router->add([
    'name' => 'multas',
    'path' => '/^\/multas\/pagar\/\d+$/',
    'action' => [MultasController::class, 'PagarAction'],
    'auth' => ['conductor', 'admin']
]);


$router->add([
    'name' => 'multasView',
    'path' => '/^\/multas$/',
    'action' => [MultasController::class, 'AllMultasAction'],
    'auth' => ['agente', 'admin']
]);

$router->add([
    'name' => 'nueva multa',
    'path' => '/^\/multas\/add$/',
    'action' => [MultasController::class, 'AddAction'],
    'auth' => ['agente', 'admin']
]);




$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    if (in_array($_SESSION['perfil'], $route['auth'])) {
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo 'Error 403. Forbidden access.';
    }
} else {
    echo 'Error 404. No route found.';
}
