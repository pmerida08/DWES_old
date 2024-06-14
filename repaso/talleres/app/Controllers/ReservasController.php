<?php

namespace App\Controllers;

use App\Models\Reservas;
use App\Models\Profesores;
use App\Models\Equipos;
use App\Models\Aulas;

class ReservasController extends BaseController
{

    public function IndexAction()
    {
        $reservas = Reservas::getInstancia();

        $profesores = Profesores::getInstancia();
        $equipos = Equipos::getInstancia();
        $aulas = Aulas::getInstancia();

        $data = [
            'reservas' => $reservas->getAll(),
            'profesores' => $profesores->getAll(),
            'equipos' => $equipos->getAll(),
            'aulas' => $aulas->getAll()
        ];
        $this->renderHTML('../view/reservas/reservas_view.php', $data);
    }

    public function AddAction()
    {
        $profesores = Profesores::getInstancia();
        $equipos = Equipos::getInstancia();
        $aulas = Aulas::getInstancia();

        if (isset($_POST['submit'])) {
            $reserva = Reservas::getInstancia();

            if (empty($_POST['created_at']) || empty($_POST['updated_at']) || empty($_POST['profesores_id'])) {
                $_SESSION['error'] = 'Rellena todos los campos';
                header('Location: /reservas/add');
                exit();
            }

            if (strtotime($_POST['fecha_inicio']) > strtotime($_POST['fecha_final'])) {

                $_SESSION['error'] = 'La fecha de finalización no puede ser anterior a la fecha de inicio';
                header('Location: /reservas/add');
                exit();
            }

            $reserva->setFechaInicio($_POST['fecha_inicio']);
            $reserva->setFechaFinal($_POST['fecha_final']);
            $reserva->setEquiposId($_POST['t_equipos_id']);
            $reserva->setProfesoresId($_POST['profesores_id']);
            $reserva->setCreatedAt($_POST['created_at']);
            $reserva->setUpdatedAt($_POST['updated_at']);
            $reserva->setDescripcion($_POST['descripcion']);
            $reserva->set();
            header('Location: /gestor/reservas');
            exit();
            // var_dump($_POST);
        }
        $data = [
            'profesores' => $profesores->getAll(),
            'equipos' => $equipos->getAll(),
            'aulas' => $aulas->getAll()
        ];
        $this->renderHTML('../view/reservas/add_view.php', $data);
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $profesores = Profesores::getInstancia();
        $equipos = Equipos::getInstancia();
        $aulas = Aulas::getInstancia();

        if (isset($_POST['submit'])) {
            $reserva = Reservas::getInstancia();
            $_SESSION['error'] = '';

            if (empty($_POST['created_at']) || empty($_POST['updated_at']) || empty($_POST['t_equipos_id']) || empty($_POST['profesores_id'])) {
                $_SESSION['error'] = 'Rellena todos los campos';
                header('Location: /reservas/add');
            }

            if (strtotime($_POST['created_at']) > strtotime($_POST['updated_at'])) {
                $_SESSION['error'] = 'La fecha de finalización no puede ser anterior a la fecha de inicio';
                header('Location: /reservas/add');
            }

            $reserva->setId($numero);
            $reserva->setFechaInicio($_POST['fecha_inicio']);
            $reserva->setFechaFinal($_POST['fecha_final']);
            $reserva->setEquiposId($_POST['t_equipos_id']);
            $reserva->setProfesoresId($_POST['profesores_id']);
            $reserva->setCreatedAt($_POST['created_at']);
            $reserva->setUpdatedAt($_POST['updated_at']);
            $reserva->setDescripcion($_POST['descripcion']);
            $reserva->edit();
            header('Location: /gestor/reservas');
        } else {
            $reserva = Reservas::getInstancia();
            $data = [
                'id' => $numero,
                'fecha_inicio' => $reserva->get($numero)[0]['fecha_inicio'],
                'fecha_final' => $reserva->get($numero)[0]['fecha_final'],
                'equipos_id' => $reserva->get($numero)[0]['equipos_id'],
                'profesores_id' => $reserva->get($numero)[0]['profesores_id'],
                'created_at' => $reserva->get($numero)[0]['created_at'],
                'updated_at' => $reserva->get($numero)[0]['updated_at'],
                'descripcion' => $reserva->get($numero)[0]['descripcion'],
                'profesores' => $profesores->getAll(),
                'equipos' => $equipos->getAll(),
                'aulas' => $aulas->getAll()
            ];
            $this->renderHTML('../view/reservas/edit_view.php', $data);
        }
    }
}
