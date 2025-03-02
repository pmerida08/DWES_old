<?php

require '../bootstrap.php';

use App\Controllers\ActividadesController;
use App\Controllers\CentCivicosController as CentCivicosController;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\InscripcionesController;
use App\Controllers\InstalacionesController;
use App\Controllers\ReservasController;
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

if ($request == '/login/') { // POST
    $auth = new AuthController($requestMethod);
    if (!$auth->loginFromRequest()) {
        exit(http_response_code(401));
    }
}

if ($request == '/register/') { // POST
    $auth = new AuthController($requestMethod);
    if (!$auth->registerFromRequest()) {
        exit(http_response_code(401));
    }
}


$input = array(json_decode(file_get_contents('php://input'), TRUE));
$autHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $autHeader);
$jwt = $arr[1];

if ($jwt) {

    try {
        $deccoded = JWT::decode($jwt, new Key(KEY, 'HS256'));
    } catch (Exception $e) {
        echo json_encode(array(
            "message" => "Acceso denegado",
            "error" => $e->getMessage()
        ));
        exit(http_response_code(401));
    }
}

$router = new Router();

// $router->add(array( // POST
//     'name' => 'tokenRefresh',
//     'path' => '/^\/token\/refresh$/',
//     'action' => ControllersContactosController::class,
// ));

$router->add(array( // GET
    'name' => 'infoUser',
    'path' => '/^\/user$/',
    'action' => UserController::class,
));

$router->add(array( // PUT
    'name' => 'updateUser',
    'path' => '/^\/user$/',
    'action' => UserController::class,
));

$router->add(array( // DELETE
    'name' => 'deleteUser',
    'path' => '/^\/user$/',
    'action' => UserController::class,
));

// Centros

$router->add(array( // GET
    'name' => 'centros',
    'path' => '/^\/centros$/',
    'action' => CentCivicosController::class,
));

$router->add(array( // GET
    'name' => 'infoCentro',
    'path' => '/^\/centros\/(\d+)$/',
    'action' => CentCivicosController::class,
));

// Instalaciones

$router->add(array( // GET
    'name' => 'instalacionCentroCiv',
    'path' => '/^\/centros\/(\d+)\/instalaciones$/',
    'action' => InstalacionesController::class,
));

$router->add(array( // GET
    'name' => 'instalaciones',
    'path' => '/^\/instalaciones$/',
    'action' => InstalacionesController::class,
));

// Actividades

$router->add(array( // GET
    'name' => 'actividadesCentroCiv',
    'path' => '/^\/centros\/(\d+)\/actividades$/',
    'action' => ActividadesController::class,
));

$router->add(array( // GET
    'name' => 'actividades',
    'path' => '/^\/actividades$/',
    'action' => ActividadesController::class,
));

// Reservas

$router->add(array( // POST
    'name' => 'nuevaReservas',
    'path' => '/^\/reservas$/',
    'action' => ReservasController::class,
));

$router->add(array( // DELETE
    'name' => 'cancelarReservas',
    'path' => '/^\/reservas\/(\d+)$/',
    'action' => ReservasController::class,
));

$router->add(array( // GET
    'name' => 'misReservas',
    'path' => '/^\/reservas$/',
    'action' => ReservasController::class,
));

// Inscripciones

$router->add(array( // POST
    'name' => 'nuevaInscripcion',
    'path' => '/^\/inscripciones$/',
    'action' => InscripcionesController::class,
));

$router->add(array( // DELETE
    'name' => 'cancelarInscripcion',
    'path' => '/^\/inscripciones\/(\d+)$/',
    'action' => InscripcionesController::class,
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
