<?php

namespace App\Models;

class Users extends DBAbstractModel
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
    public function login($nombre, $password)
    {
        $this->query = "SELECT * FROM usuarios WHERE nombre = :nombre AND password = :password";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['password'] = $password;

        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario no encontrado';
        }
        return $this->rows[0] ?? null;
    }

    public function register($nombre, $email, $password)
    {
        $this->query = "INSERT INTO usuarios(nombre, email, password) VALUES(:nombre, :email, :password)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['email'] = $email;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario añadido';
    }

    public function get($id = '') {}
    public function set() {}
    public function edit() {}
    public function delete() {}
}
