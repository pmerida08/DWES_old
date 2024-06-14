<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Ubicacion extends DBAbstractModel
{
    private $id;
    private $puesto;
    private $aulas_id;
    private $equipos_id;
    private $created_at;
    private $updated_at;

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
        $this->query = "SELECT * FROM ubicacion";
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicaciones mostradas";
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

    public function getPuesto()
    {
        return $this->puesto;
    }

    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    public function getAulas_id()
    {
        return $this->aulas_id;
    }

    public function setAulas_id($aulas_id)
    {
        $this->aulas_id = $aulas_id;
    }

    public function getEquipos_id()
    {
        return $this->equipos_id;
    }

    public function setEquipos_id($equipos_id)
    {
        $this->equipos_id = $equipos_id;
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

    public function get($id = "")
    {
        $this->query = "SELECT * FROM ubicacion WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación mostrada";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO ubicacion(puesto, aulas_id, equipos_id) VALUES(:puesto, :aulas_id, :equipos_id)";
        $this->params['puesto'] = $this->puesto;
        $this->params['aulas_id'] = $this->aulas_id;
        $this->params['equipos_id'] = $this->equipos_id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación añadida";
    }

    public function edit()
    {
        $this->query = "UPDATE ubicacion SET puesto=:puesto, aulas_id=:aulas_id, equipos_id=:equipos_id WHERE puesto=:puesto AND aulas_id=:aulas_id";
        $this->params['puesto'] = $this->puesto;
        $this->params['aulas_id'] = $this->aulas_id;
        $this->params['equipos_id'] = $this->equipos_id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación modificada";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM ubicacion WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación eliminada";
    }

    public function deleteIdEquipo($equipos_id = "")
    {
        $this->query = "DELETE FROM ubicacion WHERE equipos_id=:equipos_id";
        $this->params['equipos_id'] = $equipos_id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación eliminada";
    }

    public function getUbicacionesAula($aulas_id)
    {
        $this->query = "SELECT * FROM ubicacion WHERE aulas_id=:aulas_id";
        $this->params['aulas_id'] = $aulas_id;
        $this->getResultsFromQuery();
        return $this->rows;
    }


    public function deletePorPuestoIdAula($puesto, $aulas_id)
    {
        $this->query = "DELETE FROM ubicacion WHERE puesto=:puesto AND aulas_id=:aulas_id";
        $this->params['puesto'] = $puesto;
        $this->params['aulas_id'] = $aulas_id;
        $this->getResultsFromQuery();
        $this->mensaje = "Ubicación eliminada";
    }

    public function existeUbicacionPorPuesto($puesto, $aulas_id)
    {
        $this->query = "SELECT * FROM ubicacion WHERE puesto=:puesto AND aulas_id=:aulas_id";
        $this->params['puesto'] = $puesto;
        $this->params['aulas_id'] = $aulas_id;
        $this->getResultsFromQuery();
        if (count($this->rows) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function existeUbicacionPorEquipo($equipos_id)
    {
        $this->query = "SELECT * FROM ubicacion WHERE equipos_id=:equipos_id";
        $this->params['equipos_id'] = $equipos_id;
        $this->getResultsFromQuery();
        if (count($this->rows) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
