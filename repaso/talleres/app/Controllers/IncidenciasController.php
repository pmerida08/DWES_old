<?php

namespace App\Controllers;

use App\Models\Aulas;
use App\Models\Incidencias;
use App\Models\Profesores;

class IncidenciasController extends BaseController
{
    public function IndexAction()
    {
        $aulas = Aulas::getInstancia();
        $profesores = Profesores::getInstancia();

        $incidencias = Incidencias::getInstancia();
        $data =
            [
                'incidencias' => $incidencias->getAll(),
                'aulas' => $aulas->getAll(),
                'profesores' => $profesores->getAll()
            ];
        $this->renderHTML('../view/incidencias/incidencias_view.php', $data);
    }

    public function AddAction()
    {
        $aulas = Aulas::getInstancia();
        $profesores = Profesores::getInstancia();

        if (isset($_POST['submit'])) {
            $incidencia = Incidencias::getInstancia();

            if (empty($_POST['descripcion']) || empty($_POST['fecha']) || empty($_POST['fecha_solucion']) || empty($_POST['aulas_id']) || empty($_POST['profesores_id'])) {
                $_SESSION['error'] = 'Rellena todos los campos';
                header('Location: /incidencias/add');
            }

            if (strtotime($_POST['fecha']) > strtotime($_POST['fecha_solucion'])) {
                $_SESSION['error'] = 'La fecha de solución no puede ser anterior a la fecha de incidencia';
                header('Location: /incidencias/add');
            }

            $incidencia->setDescripcion($_POST['descripcion']);
            $incidencia->setFecha($_POST['fecha']);
            $incidencia->setFecha_solucion($_POST['fecha_solucion']);
            $incidencia->setAulas_id($_POST['aulas_id']);
            $incidencia->setProfesores_id($_POST['profesores_id']);
            $incidencia->set();
            header('Location: /gestor/incidencias');
        }
        $data = [
            'aulas' => $aulas->getAll(),
            'profesores' => $profesores->getAll()
        ];
        $this->renderHTML('../view/incidencias/add_view.php', $data);
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $aulas = Aulas::getInstancia();
        $profesores = Profesores::getInstancia();

        if (isset($_POST['submit'])) {
            $incidencia = Incidencias::getInstancia();

            if (empty($_POST['descripcion']) || empty($_POST['fecha']) || empty($_POST['fecha_solucion']) || empty($_POST['aulas_id']) || empty($_POST['profesores_id'])) {
                $_SESSION['error'] = 'Rellena todos los campos';
                header('Location: /incidencias/add');
            }

            if (strtotime($_POST['fecha']) > strtotime($_POST['fecha_solucion'])) {
                $_SESSION['error'] = 'La fecha de solución no puede ser anterior a la fecha de incidencia';
                header('Location: /incidencias/add');
            }

            $incidencia->setId($numero);
            $incidencia->setDescripcion($_POST['descripcion']);
            $incidencia->setFecha($_POST['fecha']);
            $incidencia->setFecha_solucion($_POST['fecha_solucion']);
            $incidencia->setAulas_id($_POST['aulas_id']);
            $incidencia->setProfesores_id($_POST['profesores_id']);
            $incidencia->edit();
            header('Location: /gestor/incidencias');
        } else {
            $incidencia = Incidencias::getInstancia();
            $data = [
                'id' => $numero,
                'descripcion' => $incidencia->get($numero)[0]['descripcion'],
                'fecha' => $incidencia->get($numero)[0]['fecha'],
                'fecha_solucion' => $incidencia->get($numero)[0]['fecha_solucion'],
                'aulas_id' => $incidencia->get($numero)[0]['aulas_id'],
                'profesores_id' => $incidencia->get($numero)[0]['profesores_id'],
                'aulas' => $aulas->getAll(),
                'profesores' => $profesores->getAll()
            ];
        }
        $this->renderHTML('../view/incidencias/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);
        // var_dump($numero);

        $incidencia = Incidencias::getInstancia();
        $incidencia->setId($numero);
        $incidencia->delete($numero);
        header('Location: /gestor/incidencias');
    }
}
