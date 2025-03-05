<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use Laminas\Diactoros\Response\RedirectResponse;
use Aura\Router\RouterContainer;

// Configuración de la base de datos
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DBHOST'],
    'database' => $_ENV['DBNAME'],
    'username' => $_ENV['DBUSER'],
    'password' => $_ENV['DBPASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// var_dump($request->getUri()->getPath());

$routerContainer = new Aura\Router\RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

$map->get('about', '/about', [
    'controller' => 'App\Controllers\PagesController',
    'action' => 'aboutAction'
]);

$map->get('blogs', '/blogs', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'getAllBlogAction'
]);

$map->get('addBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'addBlogAction',
    'auth' => 'true'
]);

$map->post('saveBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'addBlogAction',
    'auth' => 'true'
]);

// Match route
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    http_response_code(404);
    echo "Página no encontrada";
    exit();
}

$handlerData = $route->handler;
$controllerName = $handlerData['controller'];
$actionName = $handlerData['action'];

$controller = new $controllerName();
$response = $controller->$actionName($request);

echo $response;
