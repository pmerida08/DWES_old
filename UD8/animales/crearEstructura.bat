@echo off
:: Crear estructura de carpetas
mkdir app\Config
mkdir app\Controllers
mkdir app\Core
mkdir app\Models
mkdir app\Views
mkdir public

:: Crear archivos vacíos
type nul > app\Models\BaseController.php
type nul > app\Models\DBAbstractModel.php
type nul > app\Core\Router.php
type nul > public\.htaccess
type nul > public\index.php
type nul > .env
type nul > .gitignore
type nul > bootstrap.php
type nul > composer.json

echo Estructura creada correctamente.
pause
