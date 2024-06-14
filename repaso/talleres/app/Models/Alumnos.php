<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Alumnos extends DBAbstractModel {
    private $id;
    private $nombre;
    private $email;
    private $password;

    private $activo;

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
        $this->query = "SELECT * FROM alumnos";
        $this->getResultsFromQuery();
        $this->mensaje = "Alumnos mostrados";
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

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM alumnos WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Alumno mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO alumnos(nombre, email, password, activo) VALUES (:nombre, :email, :password, :activo)";
        $this->params['nombre'] = $this->nombre;
        $this->params['email'] = $this->email;
        $this->params['password'] = $this->password;
        $this->getResultsFromQuery();
        $this->mensaje = "Alumno añadido";
    }

    public function edit()
    {
        $this->query = "UPDATE alumnos SET nombre=:nombre, email=:email, password=:password, activo=:activo WHERE id=:id";
        $this->params['id'] = $this->id;
        $this->params['nombre'] = $this->nombre;
        $this->params['email'] = $this->email;
        $this->params['password'] = $this->password;
        $this->params['activo'] = $this->activo;
        $this->getResultsFromQuery();
        $this->mensaje = "Alumno modificado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM alumnos WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Alumno eliminado";
    }

    public function exists($nombre, $password)
    {
        $this->query = "SELECT * FROM alumnos WHERE nombre=:nombre AND password=:password";
        $this->params['nombre'] = $nombre;
        $this->params['password'] = $password;
        $this->getResultsFromQuery();
        if (count($this->rows) > 0) {
            return true;
        }
        return false;
    }
}