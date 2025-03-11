<?php

// namespace App\Models;

require_once("DBAbstractModel.php");

class Blog extends DBAbstractModel
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



    public function get($id = '')
    {
        // Implementa tu lógica para obtener un usuario por ID si es necesario
    }


    public function set()
    {
        $this->query = "INSERT INTO blog (title, author, blog, image, tags, created, updated)
            VALUES(:title, :author, :blog, :image, :tags, :created, :updated)";
        $this->parametros['title'] = $this->getTitle();
        $this->parametros['author'] = $this->getAuthor();
        $this->parametros['blog'] = $this->getBlog();
        $this->parametros['image'] = $this->getImage();
        $this->parametros['tags'] = $this->getTags();
        $this->parametros['created'] = $this->getCreated();
        $this->parametros['updated'] = $this->getUpdated();
        $this->get_results_from_query();
        $this->mensaje = "Blog añadido";
        echo $this->mensaje . "\n";
    }





    public function getId()
    {
        $title = $this->parametros['title'];
        
        $this->query = "SELECT id FROM blog WHERE title = '$title'";
        $this->get_results_from_query();
        $this->mensaje = 'Usuario agregado exitosamente';
        return $this->rows[0]['id'];
    }






    public function edit()
    {
        // Implementa tu lógica para editar un usuario si es necesario
    }

    public function delete()
    {
        // Implementa tu lógica para eliminar un usuario si es necesario
    }




    public function setTitle($title)
    {
        $this->parametros['title'] = $title;
    }

    public function setBlog($blog)
    {
        $this->parametros['blog'] = $blog;
    }

    public function setImage($image)
    {
        $this->parametros['image'] = $image;
    }

    public function setAuthor($author)
    {
        $this->parametros['author'] = $author;
    }

    public function setTags($tags)
    {
        $this->parametros['tags'] = $tags;
    }

    public function setCreated($created)
    {
        $this->parametros['created'] = date("Y-m-d H:m:s", $created->getTimestamp());
    }

    public function setUpdated($updated)
    {
        $this->parametros['updated'] = $updated;
    }

    public function getCreated()
    {
        return $this->parametros['created'];
    }



    public function addComment($comment)
    {
        // Verifica si el array de comentarios ya está inicializado
        if (!isset($this->parametros['comments'])) {
            $this->parametros['comments'] = [];
        }
        // Agrega el comentario al array de comentarios
        $this->parametros['comments'][] = $comment;
    }


    public function getTitle()
    {
        return $this->parametros['title'];
    }

    public function getBlog()
    {
        return $this->parametros['blog'];
    }

    public function getImage()
    {
        return $this->parametros['image'];
    }

    public function getAuthor()
    {
        return $this->parametros['author'];
    }

    public function getTags()
    {
        return $this->parametros['tags'];
    }

    public function getUpdated()
    {
        return $this->parametros['updated'];
    }

    public function getNumComments()
    {
        // Verifica si el array de comentarios está inicializado
        if (isset($this->parametros['comments'])) {
            // Retorna el número de comentarios en el array
            return count($this->parametros['comments']);
        } else {
            // Si el array de comentarios no está inicializado, retorna 0
            return 0;
        }
    }
}
