<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Incidencias extends DBAbstractModel
{
    private $id;
    private $descripcion;
    private $fecha;
    private $fecha_solucion;
    private $aulas_id;
    private $profesores_id;

    private static $instancia;

    public static function getInstancia()
    {
        if (!self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM incidencias";
        $this->getResultsFromQuery();
        $this->mensaje = "Incidencias mostradas";
        return $this->rows;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha_solucion()
    {
        return $this->fecha_solucion;
    }

    public function setFecha_solucion($fecha_solucion)
    {
        $this->fecha_solucion = $fecha_solucion;
    }

    public function getAulas_id()
    {
        return $this->aulas_id;
    }

    public function setAulas_id($aulas_id)
    {
        $this->aulas_id = $aulas_id;
    }

    public function getProfesores_id()
    {
        return $this->profesores_id;
    }

    public function setProfesores_id($profesores_id)
    {
        $this->profesores_id = $profesores_id;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM incidencias WHERE id=:id";
        $this->params["id"] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Incidencia obtenida";
        return $this->rows;
    }

    public function set()
    {

        $this->query = "INSERT INTO incidencias (descripcion, fecha, fecha_solucion, aulas_id, profesores_id) VALUES (:descripcion, :fecha, :fecha_solucion, :aulas_id, :profesores_id)";
        $this->params = [
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "fecha_solucion" => $this->fecha_solucion,
            "aulas_id" => $this->aulas_id,
            "profesores_id" => $this->profesores_id
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Incidencia añadida";
    }

    public function edit()
    {

        $this->query = "UPDATE incidencias SET descripcion=:descripcion, fecha=:fecha, fecha_solucion=:fecha_solucion, aulas_id=:aulas_id, profesores_id=:profesores_id WHERE id=:id";
        $this->params = [
            "id" => $this->id,
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "fecha_solucion" => $this->fecha_solucion,
            "aulas_id" => $this->aulas_id,
            "profesores_id" => $this->profesores_id
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Incidencia modificada";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM incidencias WHERE id=:id";
        $this->params["id"] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Incidencia eliminada";
    }
}
