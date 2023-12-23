<?php
// Inicia la sesión
session_start();

// Almacena datos en la sesión
$_SESSION['usuario'] = 'john_doe';
$_SESSION['rol'] = 'admin';

// Recupera datos de la sesión
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
echo "Usuario: $usuario, Rol: $rol";

// Cierra la sesión
session_destroy();
