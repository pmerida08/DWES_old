<?php

namespace App\Controllers;


class HomeController extends Controller
{
    public function index()
    {

        $auth = new AuthController();

        $auth = $auth->check('admin', 'admin');

        if ($auth) {
            header('Location: /recetas');
        } else {
            return 'Usuario o contraseña incorrectos';
        }
    }


}
