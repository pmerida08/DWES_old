<?php

namespace App\Models;

class Animales extends DBAbstractModel
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __clone()
    {
        trigger_error("La clonación de este objeto no está permitida", E_USER_ERROR);
    }

    public function __construct()
    {
        $this->query = "SELECT * FROM animales";
    }

    private $id;
    private $nombre;
    private $categoria_id;
    private $raza;
    private $foto;

    public function setNombre($nombre = "")
    {
        $this->nombre = $nombre;
    }

    public function setCategoriaId($categoria_id = "")
    {
        $this->categoria_id = $categoria_id;
    }

    public function setRaza($raza = "")
    {
        $this->raza = $raza;
    }

    public function setFoto($foto = "")
    {
        $this->foto = $foto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getFoto()
    {
        return $this->foto;
    }


    public function get($id = "")
    {
        if ($id != "") {
            $this->query = "SELECT * FROM animales WHERE id = :id";
            $this->params[":id"] = $id;
            $this->get_results_from_query();
        }
        return $this->rows ?? "";
    }
    public function set($datos)
    {
        $this->query = "INSERT INTO animales (nombre, categoria_id, raza, foto) VALUES (:nombre, :categoria_id, :raza, :foto)";
        $this->params["nombre"] = $datos["nombre"];
        $this->params["categoria_id"] = $datos["categoria_id"];
        $this->params["raza"] = $datos["raza"];
        $this->params["foto"] = $datos["foto"];

        $this->get_results_from_query();
    }

    public function edit($datos)
    {
        $this->query = "UPDATE animales SET nombre = :nombre, categoria_id = :categoria_id, raza = :raza, foto = :foto WHERE id = :id";
        $this->params["nombre"] = $datos["nombre"];
        $this->params["categoria_id"] = $datos["categoria_id"];
        $this->params["raza"] = $datos["raza"];
        $this->params["foto"] = $datos["foto"];
        $this->params["id"] = $datos["id"];

        $this->get_results_from_query();
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM animales WHERE id = :id";
        $this->params["id"] = $id;
        $this->get_results_from_query();
    }
    public function getMascotasByFilter($filter)
    {
        $this->query = "SELECT * FROM animales WHERE nombre LIKE :filter OR raza LIKE :filter";
        $this->params["filter"] = '%' . $filter . '%';
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM animales";
        $this->get_results_from_query();
        return $this->rows;
    }
}
