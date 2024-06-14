<?php

namespace App\Models;

class Productos extends DBAbstractModel
{
    private $id;
    private $nombre;
    private $precio;
    private $imagen;
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
        $this->query = "SELECT * FROM productos WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Producto mostrado";
        return $this->rows;
    }
    public function getAll(){
        $this->query = "SELECT * FROM productos";
        $this->getResultsFromQuery();
        $this->mensaje = "Productos mostrados";
        return $this->rows;
    }
    public function set()
    {
        $this->query = "INSERT INTO productos (nombre, precio, imagen) VALUES (:nombre,:precio,:imagen)";
        $this->params['nombre'] = $this->nombre;
        $this->params['precio'] = $this->precio;
        $this->params['imagen'] = $this->imagen;
        $this->getResultsFromQuery();
        $this->mensaje = "Producto añadido";
    }
    public function edit()
    {
        $this->query = "UPDATE productos SET nombre=:nombre, precio=:precio, imagen=:imagen WHERE id=:id";
        $this->params['nombre'] = $this->nombre;
        $this->params['precio'] = $this->precio;
        $this->params['imagen'] = $this->imagen;
        $this->params['id'] = $this->id;
        $this->getResultsFromQuery();
        $this->mensaje = "Producto editado";
    }
    public function delete($id = "")
    {
        if ($id == "") {
            $id = $this->id;
        }
        $this->query = "DELETE FROM productos WHERE id=:id";
        $this->params['id'] = $id;
        $this->getResultsFromQuery();
        $this->mensaje = "Producto borrado";
    }

    // Getters Propiedades
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getImagen()
    {
        return $this->imagen;
    }

    // Setters Propiedades
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}
