<?php

namespace App\Controllers;

use App\Models\Alumnos;

class AlumnosController extends BaseController
{
    public function IndexAction()
    {
        $alumnos = Alumnos::getInstancia();
        $data = $alumnos->getAll();
        $this->renderHTML('../view/alumnos/alumnos_view.php', $data);
    }

    public function AddAction()
    {
        if (isset($_POST['submit'])) {
            $alumno = Alumnos::getInstancia();
            $alumno->setNombre($_POST['nombre']);
            $alumno->setEmail($_POST['email']);
            $alumno->setPassword($_POST['password']);
            $alumno->set();
            header('Location: /alumnos');
        }
        $this->renderHTML('../view/alumnos/add_view.php');
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $alumno = Alumnos::getInstancia();
            $alumno->setId($numero);
            $alumno->setNombre($_POST['nombre']);
            $alumno->setEmail($_POST['email']);
            $alumno->setPassword($_POST['password']);
            $alumno->setActivo($_POST['activo']);
            $alumno->edit();
            header('Location: /gestor/alumnos');
        } else {
            $alumno = Alumnos::getInstancia();
            $data = [
                'id' => $numero,
                'nombre' => $alumno->get($numero)[0]['nombre'],
                'email' => $alumno->get($numero)[0]['email'],
                'password' => $alumno->get($numero)[0]['password'],
                'activo' => $alumno->get($numero)[0]['activo'] == 1 ? 'Activo' : 'Inactivo'
            ];
        }
        $this->renderHTML('../view/alumnos/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);
        $alumno = Alumnos::getInstancia();
        $alumno->setId($numero);
        $alumno->delete($numero);
        header('Location: /gestor/alumnos');
    }
}
