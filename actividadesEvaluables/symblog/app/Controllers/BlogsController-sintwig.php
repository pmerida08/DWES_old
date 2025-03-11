<?php

// namespace App\Controllers;

use App\Models\Blog;
use Respect\Validation\Validator as v;



class BlogsController extends BaseController
{
    public function indexAction()
    {


        $data = [];
        $blogs = Blog::orderBy('created', 'desc')->get();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }


        $this->renderHTML('../app/Views/index_view.php', $data);
    }

    public function aboutAction()
    {
        $data = [];
        $blogs = Blog::all();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }

        $this->renderHTML('../app/Views/about_view.php', $data);
    }

    public function addBlogAction()
    {
        if (isset($_POST['submit'])) {
            // Validar los datos del formulario
            $validation = v::key('title', v::notEmpty())
                ->key('tags', v::notEmpty());
            try {
                $validation->assert($_POST);

                // Procesar los datos del formulario y agregar el blog

                if (empty($_FILES['imagen']['name'])) {
                    $image['name'] = 'beach.jpg';
                } else {
                    $image = $_FILES['imagen'];
                }
                $blog = Blog::create([
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'blog' => $_POST['description'],
                    'image' => $image['name'],
                    'tags' => $_POST['tags'],
                ]);

                // Mover la imagen a la carpeta de imágenes
                if ($image['error'] === UPLOAD_ERR_OK) {
                    $imageFileName = $image['name'];
                    move_uploaded_file($image['tmp_name'], "../public/img/$imageFileName");
                }

                // Redireccionar a una página diferente después de agregar el blog
                header("Location: /");
                exit();
            } catch (\Exception $e) {
                // Capturar la excepción de validación y manejarla (puedes mostrar mensajes de error, etc.)
                $errors = $e->getMessage();

                // Renderizar la vista de agregar blog con mensajes de error
                $data = [
                    'errors' => $errors,
                ];

                $this->renderHTML('../app/Views/addBlog_view.php', $data);
            }
        }

        // Si no se envió el formulario, simplemente renderizar la vista de agregar blog
        $data = [];
        $blogs = Blog::all();
        $data['blogs'] = $blogs;

        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }

        $this->renderHTML('../app/Views/addBlog_view.php', $data);
    }


    public function contactAction()
    {
        $data = [];
        $blogs = Blog::all();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }
        $this->renderHTML('../app/Views/contact_view.php', $data);
    }

    public function showAction()
    {
        $data = [];
        $blogs = Blog::all();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }
        $this->renderHTML('../app/Views/show_view.php', $data);
    }

    
}
