<?php
// namespace App\Controllers;
use App\Models\User;
use App\Models\Blog;


class UsersController extends BaseController
{
    public function addUserAction()

    {
        $data = [];
        $blogs = Blog::orderBy('created', 'desc')->get();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }
        if (isset($_POST['submit']) && $_SESSION['auth'] == true) {
            $user = User::create([
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                
            ]);
            $_SESSION['userId'] = $user->id;
            $_SESSION['auth'] = true;
            header('Location: /');
        }
        $this->renderHTML('../app/Views/add_user_view.php', $data);
    }
    public function loginAction()
    {
        $data = [];
        $blogs = Blog::orderBy('created', 'desc')->get();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }

        if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $user = User::where('email', $_POST['email'])->first();
            if ($user) {
                
                if (password_verify($_POST['password'], $user->password)) {
                    $_SESSION['auth'] = true;
                    $_SESSION['userId'] = $user->id;
                    header('Location: /');
                } else {
                    echo 'Usuario o contraseña incorrectos 1';
                }
            } else {
                echo 'Usuario o contraseña incorrectos 2';
            }

        }
        $this->renderHTML('../app/Views/login_view.php', $data);
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        header('Location: /');
    }

    public function adminAction()

    {
        $data = [];
        $blogs = Blog::orderBy('created', 'desc')->get();
        $data['blogs'] = $blogs;
        // Sacar todos los comentarios de todos los blogs
        foreach ($blogs as $blog) {
            $data['comments'][] = $blog->getComments();
        }
        if ($_SESSION['auth'] == true) {
            $this->renderHTML('../app/Views/admin_view.php', $data);
        } else {
            header('Location: /');
        }
    }
}