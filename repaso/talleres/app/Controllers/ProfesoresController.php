<?php

namespace App\Controllers;

use App\Models\Profesores;

class ProfesoresController extends BaseController
{
    public function IndexAction()
    {
        $profesores = Profesores::getInstancia();
        $data = $profesores->getAll();
        $this->renderHTML('../view/profesores/profesores_view.php', $data);
    }

    public function AddAction()
    {
        if (isset($_POST['submit'])) {
            $profesor = Profesores::getInstancia();
            $profesor->setNombre($_POST['nombre']);
            $profesor->setEmail($_POST['email']);
            $profesor->setPassword($_POST['password']);
            $profesor->set();
            header('Location: /gestor/profesores');
        }
        $this->renderHTML('../view/profesores/add_view.php');
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $profesor = Profesores::getInstancia();
            $profesor->setId($numero);
            $profesor->setNombre($_POST['nombre']);
            $profesor->setEmail($_POST['email']);
            $profesor->setPassword($_POST['password']);
            $profesor->edit();
            header('Location: /gestor/profesores');
        } else {
            $profesor = Profesores::getInstancia();
            $data = [
                'id' => $numero,
                'nombre' => $profesor->get($numero)[0]['nombre'],
                'email' => $profesor->get($numero)[0]['email'],
                'password' => $profesor->get($numero)[0]['password']
            ];
        }
        $this->renderHTML('../view/profesores/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);
        $profesor = Profesores::getInstancia();
        $profesor->setId($numero);
        $profesor->delete($numero);
        header('Location: /gestor/profesores');
    }
}
