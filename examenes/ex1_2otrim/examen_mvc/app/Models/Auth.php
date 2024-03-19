<?php

namespace App\Models;

class Auth extends DBAbstractModel
{
    protected $table = 'administradores';

    protected $id;
    protected $nombre;
    protected $usuario;
    protected $password;

    public function getId()
    {
        return $this->id;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
