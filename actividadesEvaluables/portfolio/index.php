<?php
function conectadb()
{
    $dsn = "mysql:host=localhost; dbname=zoologico";
    try {
        $db = new PDO($dsn, 'us_zoologico', 'P08mv2003');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF-8'");
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

$conexion = conectadb();