<?php

use App\Controllers\RecetasController;
use App\Controllers\AuthController;
use Lib\Route;
// use App\Controllers\HomeController;

Route::get('/', [AuthController::class, 'index']);


Route::get('/recetas', [RecetasController::class, 'index']);

Route::get('/recetas/create', [RecetasController::class, 'create']);

Route::post('/recetas', [RecetasController::class, 'store']);

Route::get('/recetas/:id', [RecetasController::class, 'show']);

Route::get('/recetas/:id/edit', [RecetasController::class, 'edit']);

Route::post('/recetas/:id', [RecetasController::class, 'update']);

Route::post('/recetas/:id/delete', [RecetasController::class, 'destroy']);

// Route::get('/login', [AuthController::class, 'index']);



// Route::get('/about', function () {
//     return 'Hola desde la página acerca de';
// });

// Route::get('/courses/php', function () {
//     return 'Hola desde la página de cursos en php';
// });

// El orden de las rutas es importante, si se coloca esta ruta antes de la ruta de arriba, no se podrá acceder a la ruta de arriba

// Route::get('/courses/:slug', function ($slug) {
//     return 'Hola desde la página de cursos en el curso: ' . $slug;
// });



Route::dispatch();
