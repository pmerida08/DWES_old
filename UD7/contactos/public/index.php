<?php

require '../bootstrap.php';


use App\Controllers\ContactosController as ControllersContactosController;
use App\Core\Router;
use App\Controllers\AuthController;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Sin esto no funciona la conexion con angular en los metodos delete y post
// El motivo es que en estos metodos prmero se manda el metodo options y esto generaba un error
$requestMethod = $_SERVER['REQUEST_METHOD'];


$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $request);

$userId = null;
if (isset($uri[2])) {
    $userId = (int) $uri[2];
}

if ($request == '/login/') {
    $auth = new AuthController($requestMethod);
    if (!$auth->loginFromRequest()) {
        exit(http_response_code(401));
    }
}


// $input = array(json_decode(file_get_contents('php://input'), TRUE));
// $autHeader = $_SERVER['HTTP_AUTHORIZATION'];
// $arr = explode(" ", $autHeader);
// $jwt = $arr[1];

// if ($jwt) {

//     try {
//         $deccoded = JWT::decode($jwt, new Key(KEY, 'HS256'));
//     } catch (Exception $e) {
//         echo json_encode(array(
//             "message" => "Acceso denegado",
//             "error" => $e->getMessage()
//         ));
//         exit(http_response_code(401));
//     }
// }

$router = new Router();
$router->add(array(
    'name' => 'contactos',
    'path' => '/^\/contactos\/([0-9]+)?$/',
    'action' => ControllersContactosController::class,
));



$route = $router->match($request);
if ($route) {
    $controllerName = $route['action'];
    $controller = new $controllerName($requestMethod, $userId);
    $controller->processRequest();
} else {
    $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
    $response['body'] = null;
    echo json_encode($response);
}
