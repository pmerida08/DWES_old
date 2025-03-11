<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Models\User;
use App\Models\Blog;

class UsersController extends BaseController
{
    private $twig;

    public function __construct()
    {
        // Configurar Twig
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }
    public function getData()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $comments = [];
        foreach ($blogs as $blog) {
            $comments[$blog->title] = $blog->getComments();
        }

        $data = [
            'blogs' => $blogs,
            'comments' => $comments,
            'auth' => $_SESSION['auth'] ?? false
        ];
        return $data;
    }

    
    public function addUserAction()

    {
        
        if (isset($_POST['submit']) && $_SESSION['auth'] == true) {
            $user = User::create([
                'nombre' => $_POST['nombre'],
                'user' => $_POST['user'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'perfil' => $_POST['perfil']

            ]);
            $_SESSION['userId'] = $user->id;
            $_SESSION['auth'] = true;
            header('Location: /');
        }
        $data = $this->getData();
        echo $this->twig->render('add_user_view.twig',  [
            'data' => $data,
        ]);
    }
    public function loginAction()
    {
        if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $user = User::where('email', $_POST['email'])->first();
            if ($user) {
                // if (password_verify($_POST['password'], $user->password)) {
                    $_SESSION['auth'] = true;
                    $_SESSION['userId'] = $user->id;
                    header('Location: /');
                // } else {
                //     echo 'Usuario o contraseña incorrectos 1';
                // }
            } else {
                echo 'Usuario o contraseña incorrectos 2';
            }
        }
        $data = $this->getData();
        echo $this->twig->render('login_view.twig',  [
            'data' => $data,
        ]);
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        header('Location: /');
    }

    public function adminAction()

    {
        $data = $this->getData();
        if ($_SESSION['auth'] == true) {
            echo $this->twig->render('admin_view.twig',  [
                'data' => $data,
            ]);
        } else {
            header('Location: /');
        }
    }
}
