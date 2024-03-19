<?php

namespace App\Controllers;

use App\Models\Auth;
use Locale;

class AuthController extends Controller
{

    public function index()
    {
        $auth = new AuthController();

        $auth = $auth->check('admin', 'admin');

        header('Location: /recetas');
        // if ($auth) {
        //     header('Location: /recetas');
        // } else {
        //     return 'Usuario o contraseña incorrectos';
        // }
    }
    public function check($usuario, $password)
    {
        $model = new Auth();

        $usuario = $model->where('usuario', $usuario);

        if ($usuario) {
            if (password_verify($password, $usuario->getPassword())) {
                return true;
            }
        }

        return false;
    }

}
