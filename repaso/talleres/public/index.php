<?php
require_once "../bootstrap.php";
include("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\AulasController;
use App\Controllers\AdminController;
use App\Controllers\AlumnosController;
use App\Controllers\EquiposController;
use App\Controllers\IncidenciasController;
use App\Controllers\ProfesoresController;
use App\Controllers\ReservasController;
use App\Controllers\UbicacionController;

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
}

$router = new Router();

$router->add([
    'name' => 'aulas',
    'path' => '/^\/$/',
    'action' => [AulasController::class, 'IndexAction'],
    'auth' => ['profesor', 'alumno', 'invitado']
]);

$router->add([
    'name' => 'aulasAdmin',
    'path' => '/^\/gestor\/aulas$/',
    'action' => [AulasController::class, 'AdminAction'],
    'auth' => ['profesor', 'alumno', 'invitado']
]);

$router->add([
    'name' => 'aulas_show',
    'path' => '/^\/aulas\/\d+$/',
    'action' => [AulasController::class, 'AulaAction'],
    'auth' => ['profesor', 'alumno', 'invitado']
]);

$router->add([
    'name' => 'login',
    'path' => '/^\/login$/',
    'action' => [AdminController::class, 'LoginAction'],
    'auth' => ['invitado']
]);


$router->add([
    'name' => 'gestor',
    'path' => '/^\/gestor$/',
    'action' => [AdminController::class, 'GestorAction'],
    'auth' => ['profesor']
]);



$router->add([
    'name' => 'edit',
    'path' => '/^\/aulas\/edit\/\d+$/',
    'action' => [AulasController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'delete',
    'path' => '/^\/aulas\/delete\/\d+$/',
    'action' => [AulasController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'add',
    'path' => '/^\/aulas\/add$/',
    'action' => [AulasController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Equipos routes

$router->add([
    'name' => 'equipos',
    'path' => '/^\/gestor\/equipos$/',
    'action' => [EquiposController::class, 'IndexAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'equipos_edit',
    'path' => '/^\/equipos\/edit\/\d+$/',
    'action' => [EquiposController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'equipos_delete',
    'path' => '/^\/equipos\/delete\/\d+$/',
    'action' => [EquiposController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'equipos_add',
    'path' => '/^\/equipos\/add$/',
    'action' => [EquiposController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Incidencias routes

$router->add([
    'name' => 'incidencias',
    'path' => '/^\/gestor\/incidencias$/',
    'action' => [IncidenciasController::class, 'IndexAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'incidencias_edit',
    'path' => '/^\/incidencias\/edit\/\d+$/',
    'action' => [IncidenciasController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'incidencias_delete',
    'path' => '/^\/incidencias\/delete\/\d+$/',
    'action' => [IncidenciasController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'incidencias_add',
    'path' => '/^\/incidencias\/add$/',
    'action' => [IncidenciasController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Profesores routes

$router->add([
    'name' => 'profesores',
    'path' => '/^\/gestor\/profesores$/',
    'action' => [ProfesoresController::class, 'IndexAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'profesores_edit',
    'path' => '/^\/profesores\/edit\/\d+$/',
    'action' => [ProfesoresController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'profesores_delete',
    'path' => '/^\/profesores\/delete\/\d+$/',
    'action' => [ProfesoresController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'profesores_add',
    'path' => '/^\/profesores\/add$/',
    'action' => [ProfesoresController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Reservas routes

$router->add([
    'name' => 'reservas',
    'path' => '/^\/gestor\/reservas$/',
    'action' => [ReservasController::class, 'IndexAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'reservas_edit',
    'path' => '/^\/reservas\/edit\/\d+$/',
    'action' => [ReservasController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'reservas_delete',
    'path' => '/^\/reservas\/delete\/\d+$/',
    'action' => [ReservasController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'reservas_add',
    'path' => '/^\/reservas\/add$/',
    'action' => [ReservasController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Alumnos routes

$router->add([
    'name' => 'alumno',
    'path' => '/^\/gestor\/alumnos$/',
    'action' => [AlumnosController::class, 'IndexAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'alumnos_edit',
    'path' => '/^\/alumno\/edit\/\d+$/',
    'action' => [AlumnosController::class, 'EditAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'alumnos_delete',
    'path' => '/^\/alumno\/delete\/\d+$/',
    'action' => [AlumnosController::class, 'DeleteAction'],
    'auth' => ['profesor']
]);

$router->add([
    'name' => 'alumnos_add',
    'path' => '/^\/alumno\/add$/',
    'action' => [AlumnosController::class, 'AddAction'],
    'auth' => ['profesor']
]);

// Ubicacion routes

$router->add([
    'name' => 'ubicacion',
    'path' => '/^\/ubicacion\/change$/',
    'action' => [UbicacionController::class, 'changeAction'],
    'auth' => ['profesor', 'alumno']
]);


$router->add([
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [AdminController::class, 'LogoutAction'],
    'auth' => ['profesor', 'alumno']
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
