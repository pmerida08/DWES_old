<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Multas extends DBAbstractModel
{
    private $id;
    private $id_agente;
    private $id_conductor;
    private $matricula;

    private $id_tipo_sanciones;
    private $descripcion;
    private $fecha;
    private $importe;
    private $descuento;
    private $estado;

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
        $this->query = "SELECT * FROM multas";
        $this->getResultsFromQuery();
        $this->mensaje = "multas mostrados";
        return $this->rows;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM multas WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO multas (matricula, descripcion, fecha, importe, descuento, estado) VALUES(:matricula,:descripcion, :fecha, :importe, :descuento,:estado)";
        $this->params['matricula'] = $this->matricula;
        $this->params['descripcion'] = $this->descripcion;
        $this->params['fecha'] = $this->fecha;
        $this->params['importe'] = $this->importe;
        $this->params['descuento'] = $this->descuento;
        $this->params['estado'] = $this->estado;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario añadido";
    }

    public function edit()
    {
        $this->query = "UPDATE multas SET matricula=:matricula, descripcion=:descripcion, fecha=:fecha, importe=:importe, descuento=:descuento, estado=:estado WHERE id=:id";
        $this->params['id'] = $this->id;
        $this->params['matricula'] = $this->matricula;
        $this->params['descripcion'] = $this->descripcion;
        $this->params['fecha'] = $this->fecha;
        $this->params['importe'] = $this->importe;
        $this->params['descuento'] = $this->descuento;
        $this->params['estado'] = $this->estado;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario modificado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM multas WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Multa eliminado";
    }

    public function getConductorMulta($id_conductor)
    {
        $this->query = "SELECT * FROM multas WHERE id_conductor=:id_conductor";
        $this->params['id_conductor'] = $id_conductor;
        $this->getResultsFromQuery();
        return $this->rows;
    }

    public function getAgenteMulta($id_agente)
    {
        $this->query = "SELECT * FROM multas WHERE id_agente=:id_agente";
        $this->params['id_agente'] = $id_agente;
        $this->getResultsFromQuery();
        return $this->rows;
    }

    public function getMatriculaMulta($matricula)
    {
        $this->query = "SELECT * FROM multas WHERE matricula=:matricula";
        $this->params['matricula'] = $matricula;
        $this->getResultsFromQuery();
        return $this->rows;
    }

    public function setPagada($id)
    {
        $this->query = "UPDATE multas SET estado='pagada' WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Multa pagada";
    }

    public function getTipoSanciones()
    {
        $this->query = "SELECT * FROM tipo_sanciones";
        $this->getResultsFromQuery();
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

    public function getId_agente()
    {
        return $this->id_agente;
    }

    public function setId_agente($id_agente)
    {
        $this->id_agente = $id_agente;
    }

    public function getId_conductor()
    {
        return $this->id_conductor;
    }

    public function setId_conductor($id_conductor)
    {
        $this->id_conductor = $id_conductor;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function getId_tipo_sanciones()
    {
        return $this->id_tipo_sanciones;
    }

    public function setId_tipo_sanciones($id_tipo_sanciones)
    {
        $this->id_tipo_sanciones = $id_tipo_sanciones;
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

    public function getImporte()
    {
        return $this->importe;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
