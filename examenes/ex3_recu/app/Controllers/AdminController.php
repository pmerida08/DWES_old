<?php

namespace App\Controllers;

use App\Models\Usuarios;

class AdminController extends BaseController
{
    public function IndexAction()
    {
        $usuarios = Usuarios::getInstancia();
        $data = $usuarios->getAll();
        $this->renderHTML('../view/index_view.php', $data);
    }
    public function LoginAction()
    {
        $figures = ['<i class="fa-solid fa-caret-up"></i>', '<i class="fa-solid fa-square"></i>', '<i class="fa-solid fa-circle"></i>'];
        $figureSelected = $figures[random_int(0, 2)];
        $_SESSION['figureSelected'] = $figureSelected;

        $videos = ['https://www.youtube.com/watch?v=XyHdFT1OQr4', 'https://www.youtube.com/watch?v=fCSsUTZtzkk', 'https://www.youtube.com/watch?v=_CJ_7dFShQE'];
        $videoSelected = $videos[random_int(0,2)];
        $_SESSION['videoSelected'] = $videoSelected;

        if (isset($_POST['submit'])) {
            $usuarios = Usuarios::getInstancia();

            if ($usuarios->exists($_POST['user'], $_POST['passwd'])) {
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['perfil'] = $usuarios->getUserPerfil($_POST['user'])[0]['perfil'];

                if ($_POST['figure'] == $figureSelected) {
                    echo 'La figura no coincide';
                    exit();
                }
                header('Location: /');
            }
        } else {
            $_SESSION['user'] = '';
            $_SESSION['perfil'] = 'invitado';
            $_SESSION['error'] = 'Usuario o contraseña incorrectos';
        }

        $this->renderHTML('../view/login_view.php');
    }

    public function LogoutAction()
    {
        session_destroy();
        header('Location: /');
    }
}
