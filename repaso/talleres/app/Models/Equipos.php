<?php


namespace App\Models;

use App\Models\DBAbstractModel;


class Equipos extends DBAbstractModel
{
    public $id;
    public $codigo;
    public $descripcion;
    public $referencia_ja;
    public $imagen;
    public $t_estados_id;

    public $created_at;

    public $updated_at;

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

    public function get($id = "")
    {

        $this->query = "SELECT * FROM equipos WHERE id=:id";
        $this->params = ['id' => $id];
        $this->getResultsFromQuery();
        $this->mensaje = "Equipo mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO equipos (codigo, descripcion, referencia_ja, imagen, t_estados_id) VALUES (:codigo, :descripcion, :referencia_ja, :imagen, :t_estados_id)";
        $this->params = [
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'referencia_ja' => $this->referencia_ja,
            'imagen' => $this->imagen,
            't_estados_id' => $this->t_estados_id
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Equipo añadido";
    }

    public function edit()
    {
        $this->query = "UPDATE equipos SET codigo=:codigo, descripcion=:descripcion, referencia_ja=:referencia_ja, imagen=:imagen, t_estados_id=:t_estados_id WHERE id=:id";
        $this->params = [
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'referencia_ja' => $this->referencia_ja,
            'imagen' => $this->imagen,
            't_estados_id' => $this->t_estados_id,
            'id' => $this->id
        ];
        $this->getResultsFromQuery();
        $this->mensaje = "Equipo modificado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM equipos WHERE id=:id";
        $this->params = ['id' => $id];
        $this->getResultsFromQuery();
        $this->mensaje = "Equipo borrado";
    }



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter and setter for $codigo
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    // Getter and setter for $referencia_ja
    public function getReferenciaJa()
    {
        return $this->referencia_ja;
    }

    public function setReferenciaJa($referencia_ja)
    {
        $this->referencia_ja = $referencia_ja;
    }

    // Getter and setter for $imagen
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    // Getter and setter for $t_estados_id
    public function getTEstadosId()
    {
        return $this->t_estados_id;
    }

    public function setTEstadosId($t_estados_id)
    {
        $this->t_estados_id = $t_estados_id;
    }


    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
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

    public function getAll()
    {
        $this->query = "SELECT * FROM equipos";
        $this->getResultsFromQuery();
        return $this->rows;
    }

    public function getAllCodigos()
    {
        $this->query = "SELECT codigo FROM equipos";
        $this->getResultsFromQuery();
        return $this->rows;
    }

    public function getEstados()
    {
        $this->query = "SELECT * FROM t_estados";
        $this->getResultsFromQuery();
        return $this->rows;
    }

}
