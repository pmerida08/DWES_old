<?php

namespace App\Controllers;

use App\Models\Profesores;
use App\Models\Alumnos;
use Google\Service\Oauth2 as Google_Service_Oauth2;

class AdminController extends BaseController
{
    public function AdminAction()
    {
        $this->renderHTML('../view/aulas/aulas_view.php');
    }
    public function LoginAction()
    {
        if (isset($_POST['submit'])) {

            $profesores = Profesores::getInstancia();
            $alumnos = Alumnos::getInstancia();

            if ($profesores->exists($_POST['user'], $_POST['passwd'])) {
                $_SESSION['perfil'] = 'profesor';
                header('Location: /gestor/aulas');
            } else if ($alumnos->exists($_POST['user'], $_POST['passwd'])) {
                $_SESSION['perfil'] = 'alumno';
                header('Location: /');
            } else {
                $_SESSION['perfil'] = 'invitado';
                $_SESSION['error'] = 'Usuario o contraseña incorrectos';
                header('Location: /login');
            }
        } else if (isset($_GET['code'])) {
            $token = CLIENT->fetchAccessTokenWithAuthCode($_GET['code']);
            CLIENT->setAccessToken($token['access_token']);
            $google_oauth = new Google_Service_Oauth2(CLIENT);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            
        }
        $this->renderHTML('../view/login_view.php');
    }

    public function GestorAction()
    {
        $this->renderHTML('../view/gestor_view.php');
    }

    public function LogoutAction()
    {
        session_destroy();
        header('Location: /');
    }
}
