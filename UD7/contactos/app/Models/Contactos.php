<?php
namespace App\Models;
require_once("DBAbstractModel.php");
class Contactos extends DBAbstractModel
{
    //Singleton
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error("La clonación no está permitida.", E_USER_ERROR);
    }

    public function set($data=array()) // funciona
    {
        echo 'entra a bd';
        foreach($data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO contactos(nombre,telefono,email) VALUES(:nombre, :telefono, :email)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
        $this->mensaje = 'SH añadido';
    }

    public function get($id = "") // funciona
    {
        if ($id != '') {
            $this->query = "SELECT * FROM contactos WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows)==1) {
            foreach($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
            return $this->rows[0]; // para que no te devuelva el valor del id en el resultado
        }
        else {
            $this->mensaje = 'sh no encontrado';
            return [];
        }
    }

    public function edit($id = "", $user_data = []) // funciona
    {
        $fecha = new \DateTime();
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        
        $this->query = "UPDATE contactos
        SET nombre=:nombre,
        telefono=:telefono,
        email=:email,
        updated_at=:fecha
        WHERE id=:id";

        $this->parametros['id']= $id;
        $this->parametros['nombre']= $nombre;
        $this->parametros['telefono']= $telefono;
        $this->parametros['email']= $email;

        $this->parametros['fecha']= date("Y-m-d H:m:s", $fecha->getTimestamp());
        $this->get_results_from_query();
        $this->mensaje = 'SH modificado';

    }

    public function delete($id="") // funciona
    {
        $this->query = "DELETE FROM contactos WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto eliminado';
    }
    public function getAll() // funciona
    {
        $this->query = "SELECT * FROM contactos";
        $this->get_results_from_query();
        return $this->rows;
    }

}
