<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Profesores extends DBAbstractModel
{
    private $id;
    private $nombre;
    private $email;
    private $password;

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
        $this->query = "SELECT * FROM profesores";
        $this->getResultsFromQuery();
        $this->mensaje = "Profesores mostrados";
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM profesores WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Profesor mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO profesores(nombre, email, password) VALUES(:nombre, :email, :password)";
        $this->params['nombre'] = $this->nombre;
        $this->params['email'] = $this->email;
        $this->params['password'] = $this->password;
        $this->getResultsFromQuery();
        $this->mensaje = "Profesor añadido";
    }

    public function edit()
    {
        $this->query = "UPDATE profesores SET nombre=:nombre, email=:email, password=:password WHERE id=:id";
        $this->params['id'] = $this->id;
        $this->params['nombre'] = $this->nombre;
        $this->params['email'] = $this->email;
        $this->params['password'] = $this->password;
        $this->getResultsFromQuery();
        $this->mensaje = "Profesor modificado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM profesores WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Profesor eliminado";
    }

    public function exists($user, $password)
    {
        $this->query = "SELECT * FROM profesores WHERE nombre=:nombre AND password=:password";
        $this->params['nombre'] = $user;
        $this->params['password'] = $password;
        $this->getResultsFromQuery();
        if (count($this->rows) == 1) {
            return true;
        }
        return false;
    }
}
