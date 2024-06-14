<?php
require_once "../bootstrap.php";
include("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\ProductosController;

$router = new Router();

$router->add([
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [ProductosController::class, 'index']
]);

$router->add([
    'name' => 'edit',
    'path' => '/^\/edit\?id=(\d+)$/',
    'action' => [ProductosController::class, 'edit']
]);



// $productos->setId(1);
// $productos->setNombre("Timi");
// $productos->setImagen("");
// $productos->setPrecio(1);
// $productos->edit();
// echo $productos->getMensaje();

// $productos->setId(1);
// $productos->delete(1);  
// echo $productos->getMensaje();

// $resultado = $productos->get(2);
// $resultadoTotal = $productos->getAll();
// var_dump($resultado);
// echo "</br>";
// var_dump($resultadoTotal);



$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo 'Error 404. No route found.';
}
