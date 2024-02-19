<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usuario;

class AuthController extends BaseController
{
    public function LoginAction($user = "", $passwd = ""){
        $auth = Usuario::getInstancia();
        
    }
}

?>