<?php

namespace App\Controllers;

use App\Models\Multas;
use App\Models\Usuarios;

class MultasController extends BaseController
{
    public function MultasAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $usuarios = Usuarios::getInstancia();
        $multas = Multas::getInstancia();
        $data = [
            'multas' => $multas->getAll(),
            'usuarios' => $usuarios->getAll(),
            'conductor' => $multas->getConductorMulta($numero)
        ];
        $this->renderHTML('../view/multas_view.php', $data);
    }

    public function AllMultasAction()
    {

        $multas = Multas::getInstancia();
        $usuarios = Usuarios::getInstancia();

        $data = [
            'multas' => $multas->getAll(),
            'usuarios' => $usuarios->getAll()
        ];
        $this->renderHTML('../view/multas_view.php', $data);
    }

    public function AddAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $multas = Multas::getInstancia();
            $multas->setMatricula($_POST['matricula']);
            $multas->setDescripcion($_POST['descripcion']);
            $multas->setFecha($_POST['fecha']);
            $multas->setId_conductor($_POST['conductor']);
            $multas->setId_agente($numero);
            $multas->set();
            // header('Location: /');
        } else {
            $multas = Multas::getInstancia();
            $usuarios = Usuarios::getInstancia();
            $data = [
                'usuarios' => $usuarios->getAll(),
                'sancion' => $multas->getTipoSanciones(),
            ];
            $this->renderHTML('../view/addMultas_view.php', $data);
        }
    }

    public function PagarAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);
        $multas = Multas::getInstancia();
        $usuarios = Usuarios::getInstancia();

        $data = [
            'multa' => $multas->get($numero),
            'sancion' => $multas->getTipoSanciones(),
            'usuarios' => $usuarios->getAll()
        ];

        if (isset($_POST['enviar'])) {
            $multas->setPagada($numero);
            header('Location: /');
        }
        $this->renderHTML('../view/pagarMultas_view.php', $data);
    }
}
