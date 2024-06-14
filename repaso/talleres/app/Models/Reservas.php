<?php

namespace App\Models;

use App\Models\DBAbstractModel;


class Reservas extends DBAbstractModel
{
    private $id;
    private $fecha_inicio;
    private $fecha_final;
    private $equipos_id;
    private $profesores_id;
    private $created_at;
    private $updated_at;
    private $descripcion;


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
        $this->query = "SELECT * FROM reservas";
        $this->getResultsFromQuery();
        $this->mensaje = "Reservas mostradas";
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

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFinal()
    {
        return $this->fecha_final;
    }

    public function setFechaFinal($fecha_final)
    {
        $this->fecha_final = $fecha_final;
    }

    public function getEquiposId()
    {
        return $this->equipos_id;
    }

    public function setEquiposId($equipos_id)
    {
        $this->equipos_id = $equipos_id;
    }

    public function getProfesoresId()
    {
        return $this->profesores_id;
    }

    public function setProfesoresId($profesores_id)
    {
        $this->profesores_id = $profesores_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM reservas WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Reserva mostrada";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO reservas(fecha_inicio, fecha_final, equipos_id, profesores_id, created_at, updated_at, descripcion) VALUES(:fecha_inicio, :fecha_final, :equipos_id, :profesores_id, :created_at, :updated_at, :descripcion)";
        $this->params = [
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'equipos_id' => $this->equipos_id,
            'profesores_id' => $this->profesores_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'descripcion' => $this->descripcion
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Reserva añadida";
    }

    public function edit()
    {
        $this->query = "UPDATE reservas SET fecha_inicio=:fecha_inicio, fecha_final=:fecha_final, equipos_id=:equipos_id, profesores_id=:profesores_id, updated_at=:updated_at, descripcion=:descripcion WHERE id=:id";
        $this->params = [
            'id' => $this->id,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'equipos_id' => $this->equipos_id,
            'profesores_id' => $this->profesores_id,
            'updated_at' => $this->updated_at,
            'descripcion' => $this->descripcion
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Reserva editada";
    }

    public function delete()
    {
        $this->query = "DELETE FROM reservas WHERE id=:id";
        $this->params['id'] = $this->id;
        $this->getResultsFromQuery();
        $this->mensaje = "Reserva eliminada";
    }
}
