<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Usuarios extends DBAbstractModel
{
    private $id;
    private $usuario;
    private $password;
    private $nombre;

    private $perfil;
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
        $this->query = "SELECT * FROM usuarios";
        $this->getResultsFromQuery();
        $this->mensaje = "Usuarios mostrados";
        return $this->rows;
    }

    public function get($id = "")
    {
        $this->query = "SELECT * FROM usuarios WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario mostrado";
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO usuarios (usuario, password, nombre, perfil) VALUES(:usuario,:password, :nombre, :perfil)";
        $this->params['usuario'] = $this->usuario;
        $this->params['password'] = $this->password;
        $this->params['nombre'] = $this->nombre; 
        $this->params['perfil'] = $this->perfil; 
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario añadido";
    }

    public function edit()
    {
        $this->query = "UPDATE usuarios SET usuario=:usuario, password=:password, nombre=:nombre, perfil=:perfil WHERE id=:id";
        $this->params['id'] = $this->id;
        $this->params['usuario'] = $this->usuario;
        $this->params['password'] = $this->password;
        $this->params['nombre'] = $this->nombre; 
        $this->params['perfil'] = $this->perfil; 
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario modificado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Usuario eliminado";
    }

    public function exists($usuario, $password)
    {
        $this->query = "SELECT * FROM usuarios WHERE usuario=:usuario AND password=:password";
        $this->params['usuario'] = $usuario;
        $this->params['password'] = $password;
        $this->getResultsFromQuery();
        if (count($this->rows) == 1) {
            return true;
        }
        return false;
    }

    public function getUserPerfil($usuario) {
        $this->query = "SELECT perfil FROM usuarios WHERE usuario=:usuario";
        $this->params['usuario'] = $usuario;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }
}
