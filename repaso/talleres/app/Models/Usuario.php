<?php


namespace App\Models;

use App\Models\DBAbstractModel;


class Usuario extends DBAbstractModel
{
    public $id;
    public $user;
    public $passwd;

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

    public function get($user = "")
    {
        $this->query = "SELECT * FROM usuarios WHERE user=:user";
        $this->params['user'] = $user;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario mostrado";
        return $this->rows;
    }

    public function set()
    {
    }

    public function edit()
    {
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario eliminado";
    }

    public function getAll()
    {

        $this->query = "SELECT * FROM usuarios";
        $this->getResultsFromQuery();
        $this->mensaje = "Usuarios mostrados";
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    public function WhoIs($user, $passwd)
    {
        $profesores = Profesores::getInstancia();
        $profesores = $profesores->getAll();

        $alumnos = Alumnos::getInstancia();
        $alumnos = $alumnos->getAll();

        foreach ($profesores as $profesor) {
            if ($profesor['nombre'] == $user && $profesor['password'] == $passwd) {
                return 'profesor';
            }
        }
        foreach ($alumnos as $alumno) {
            if ($alumno['nombre'] == $user && $alumno['password'] == $passwd) {
                return 'alumno';
            }
        }

        return 'Error: No se ha encontrado el usuario o la contraseña no es correcta';
    }
}
