<?php

require_once('model/dbabstract_model.php');
class Animales extends Dbabstract_model
{
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set($sh_data = array())
    {
        foreach ($sh_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO animales(nombre) VALUES(:nombre)";
        $this->parametros["nombre"] = $nombre;
        $this->get_results_from_query();
        $this->mensaje = 'Animal añadido';
    }
    public function get($id = '')
    {
        $this->query = "SELECT nombre FROM animales WHERE id=(:id)";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function delete($sh_data = array())
    {
    }
    public function edit()
    {
        $this->query = "UPDATE animales SET nombre=:nombre WHERE id=:id";
        $this->parametros["id"] = $this->id;
        $this->parametros["nombre"] = $this->nombre;
        $this->get_results_from_query();
    }
}
