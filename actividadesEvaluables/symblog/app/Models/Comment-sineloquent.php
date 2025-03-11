<?php

namespace App\Models;
use App\Models\DBAbstractModel;
use App\Models\Blog;




class Comment extends DBAbstractModel
{
    // Singleton
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

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function get()
    {//
    }

    public function set()
    {// Lógica para agregar un commentario
        
        $blog_id = $this->parametros['blog']->getId();
        $this->query = "INSERT INTO comment(user, comment, blog_id) VALUES (:user, :comment, '$blog_id')";
        $this->parametros['user'] = $this->getUser();
        $this->parametros['comment'] = $this->getComment();
        
        $this->get_results_from_query();
        $this->mensaje = 'Comentario agregado exitosamente';
    }

    public function edit()
    {
    }

    public function delete()
    {
    }
  

    public function setUser($user)
    {
        $this->parametros['user'] = $user;
    }

    public function setComment($comment)
    {
        $this->parametros['comment'] = $comment;
    }

    public function setBlog($blog)
    {
        $this->parametros['blog'] = $blog;
    }

    public function setCreated($created)
    {
        $this->parametros['created'] = $created;
    }

    public function getUser()
    {
        return $this->parametros['user'];
    }

    public function getComment()
    {
        return $this->parametros['comment'];
    }

    public function getBlog()
    {
        return $this->parametros['blog'];
    }

    public function getCreated()
    {
        return $this->parametros['created'];
    }


}
