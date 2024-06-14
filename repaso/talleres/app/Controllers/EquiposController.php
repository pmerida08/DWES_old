<?php

namespace App\Controllers;

use App\Models\Equipos;

class EquiposController extends BaseController
{
    public function IndexAction()
    {
        $equipos = Equipos::getInstancia();
        $data = $equipos->getAll();
        $this->renderHTML('../view/equipos/equipos_view.php', $data);
    }

    public function AddAction()
    {
        if (isset($_POST['submit'])) {
            $equipos = Equipos::getInstancia();
            $equipos->setCodigo($_POST['codigo']);
            $equipos->setDescripcion($_POST['descripcion']);
            $equipos->setReferenciaJa($_POST['referencia_ja']);
            $equipos->setImagen($_POST['imagen']);
            $equipos->setTEstadosId($_POST['t_estados_id']);
            $equipos->setCreated_at($_POST['created_at']);
            $equipos->setUpdated_at($_POST['updated_at']);
            $equipos->set();
            header('Location: /gestor/equipos');
        }
        $this->renderHTML('../view/equipos/add_view.php');
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $equipos = Equipos::getInstancia();
            $equipos->setId($numero);
            $equipos->setCodigo($_POST['codigo']);
            $equipos->setDescripcion($_POST['descripcion']);
            $equipos->setReferenciaJa($_POST['referencia_ja']);
            $equipos->setImagen($_POST['imagen']);
            $equipos->setTEstadosId($_POST['t_estados_id']);
            $equipos->setCreated_at($_POST['created_at']);
            $equipos->setUpdated_at($_POST['updated_at']);
            $equipos->edit();
            header('Location: /gestor/equipos');
        } else {
            $equipos = Equipos::getInstancia();
            $data = [
                'id' => $numero,
                'codigo' => $equipos->get($numero)[0]['codigo'],
                'descripcion' => $equipos->get($numero)[0]['descripcion'],
                'referencia_ja' => $equipos->get($numero)[0]['referencia_JA'],
                'imagen' => $equipos->get($numero)[0]['imagen'],
                't_estados_id' => $equipos->get($numero)[0]['t_estados_id'],
                'created_at' => $equipos->get($numero)[0]['created_at'],
                'updated_at' => $equipos->get($numero)[0]['updated_at'],
                'css' => $equipos->get($numero)[0]['css']
            ];
        }
        $this->renderHTML('../view/equipos/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $equipos = Equipos::getInstancia();
        $equipos->setId($numero);
        $equipos->delete($numero);
        header('Location: /gestor/equipos');
    }
}
