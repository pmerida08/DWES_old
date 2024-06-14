<?php

namespace App\Models;

use App\Models\DBAbstractModel;
use App\Models\Ubicacion;

class Aulas extends DBAbstractModel
{
    private $id;
    private $codigo;
    private $t_agrupamiento_grupos_id;
    // private $descripcion;
    private $numero_mesas;

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

    // public function get($id = "")
    // {
    //     $this->query = "SELECT * FROM productos WHERE id=:id";
    //     $this->params['id'] = $id;
    //     $this->getResultsFromQuery();
    //     $this->mensaje = "Producto mostrado";
    //     return $this->rows;
    // }
    public function getAll()
    {
        $this->query = "SELECT * FROM aulas";
        $this->getResultsFromQuery();
        $this->mensaje = "Productos mostrados";
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

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getT_agrupamiento_grupos_id()
    {
        return $this->t_agrupamiento_grupos_id;
    }

    public function setT_agrupamiento_grupos_id($t_agrupamiento_grupos_id)
    {
        $this->t_agrupamiento_grupos_id = $t_agrupamiento_grupos_id;
    }

    public function getNum_mesas()
    {
        return $this->numero_mesas;
    }

    public function setNum_mesas($numero_mesas)
    {
        $this->numero_mesas = $numero_mesas;
    }

    // public function getDescripcion()
    // {
    //     return $this->descripcion;
    // }



    public function get($id = "")
    {
        $this->query = "SELECT * FROM aulas WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Aula mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO aulas (codigo, t_agrupamiento_grupos_id, numero_mesas) VALUES (:codigo,:t_agrupamiento_grupos_id,:numero_mesas)";
        $this->params['codigo'] = $this->codigo;
        $this->params['t_agrupamiento_grupos_id'] = $this->t_agrupamiento_grupos_id;
        $this->params['numero_mesas'] = $this->numero_mesas;
        $this->getResultsFromQuery();
        $this->mensaje = "Aula añadida";
    }
    public function edit()
    {
        $this->query = "UPDATE aulas SET codigo=:codigo, t_agrupamiento_grupos_id=:t_agrupamiento_grupos_id, numero_mesas=:numero_mesas WHERE id=:id";
        $this->params['codigo'] = $this->codigo;
        $this->params['t_agrupamiento_grupos_id'] = $this->t_agrupamiento_grupos_id;
        $this->params['numero_mesas'] = $this->numero_mesas;
        $this->params['id'] = $this->id;
        $this->getResultsFromQuery();
        $this->mensaje = "Aula editada";
    }
    public function delete($id = "")
    {
        if ($id == "") {
            $id = $this->id;
        }
        $this->query = "DELETE FROM aulas WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Aula borrada";
    }

    public function getAgrupamientosAula($id){
        $this->query = "SELECT * FROM t_agrupamientos_grupos WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        return $this->rows;
    }


    
}
