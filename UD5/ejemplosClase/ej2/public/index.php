<?php 
require_once("../app/Config/config.php");
require_once("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\ListController;

$router = new Router();
$controller = new IndexController();

$router->add([
    "name" => "home",
    "path" => "/^\/$/",
    "action" => [IndexController::class, "IndexAction"],
]);

$router->add([
    "name"=> "saludo",
    "path"=> "/^\/saludo\/[A-z]+$/",
    "action"=> [IndexController::class,"SaludaAction"],
]);

$router->add([
    "name"=> "numeros",
    "path"=> "/^\/numeros\/[0-9]+$/",
    "action"=> [ListController::class,"NumerosAction"],
]);

$request = str_replace(DIRBASEURL, "", $_SERVER["REQUEST_URI"]);
$route = $router->match($request);


if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo("Error");
}
?>