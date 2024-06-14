<?php

require_once '../vendor/autoload.php';
require_once '../app/Config/config.php';

use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();

$router->add([
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'indexAction']
]);

$router->add([
    'name' => 'saludo',
    'path' => '/^\/saludo$/',
    'action' => [IndexController::class, 'saludo']
]);

$router->add([
    'name' => 'numPar',
    'path' => '/^\/[0-9]+$/',
    'action' => [IndexController::class, 'numPar']
]);

$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo 'Error 404. No route found.';
}
