<?php

require_once '../vendor/autoload.php';
require_once '../app/Config/config.php';

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\ProductosController;
use App\Controllers\CarritoController;

$router = new Router();

$router->add([
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'indexAction']
]);

$router->add([
    'name' => 'list',
    'path' => '/^\/list\/(?<producto>pizzas|bebidas|postres)$/',
    'action' => [ProductosController::class, 'listAction']
]);

$router->add([
    'name' => 'carrito',
    'path' => '/^\/carrito\/add$/',
    'action' => [CarritoController::class, 'addCarrito']
]);

$router->add([
    'name' => 'carrito',
    'path' => '/^\/carrito$/',
    'action' => [CarritoController::class, 'carritoAction']
]);


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
