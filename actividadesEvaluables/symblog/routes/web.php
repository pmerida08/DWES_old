<?php

use App\Controllers\BlogController;
use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/create', [BlogController::class, 'create']);

Route::post('/blog', [BlogController::class, 'store']);

Route::get('/blog/:id', [BlogController::class, 'show']);

Route::get('/blog/:id/edit', [BlogController::class, 'edit']);

Route::post('/blog/:id', [BlogController::class, 'update']);

Route::post('/blog/:id/delete', [BlogController::class, 'destroy']);


Route::dispatch();
