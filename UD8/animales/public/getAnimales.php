<?php
require '../vendor/autoload.php';
require_once '../bootstrap.php';

use App\Controllers\AnimalesController;

$q = $_GET['q'] ?? "";

$animalesController = new AnimalesController();

$animalesController->IndexAction($q);