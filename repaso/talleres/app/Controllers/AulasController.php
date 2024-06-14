<?php

namespace App\Controllers;

use App\Models\Aulas;
use App\Models\Equipos;
use App\Models\Profesores;
use App\Models\Incidencias;
use App\Models\Ubicacion;

class AulasController extends BaseController
{
    public function IndexAction()
    {
        $aulas = Aulas::getInstancia();
        $data = [
            'aulas' => $aulas->getAll(),
        ];

        $this->renderHTML('../view/index_view.php', $data);
    }

    public function AdminAction()
    {
        $aulas = Aulas::getInstancia();

        $data = $aulas->getAll();
        $this->renderHTML('../view/aulasAdmin_view.php', $data);
    }

    public function AddAction()
    {
        if (isset($_POST['submit'])) {
            $aula = Aulas::getInstancia();
            $aula->setCodigo($_POST['codigo']);
            $aula->setT_agrupamiento_grupos_id($_POST['t_agrupamiento_grupos_id']);
            $aula->setNum_mesas($_POST['numero_mesas']);
            $aula->set();
            header('Location: /gestor/aulas');
        }
        $this->renderHTML('../view/aulas/add_view.php');
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $aula = Aulas::getInstancia();
            $aula->setId($numero);
            $aula->setCodigo($_POST['codigo']);
            $aula->setT_agrupamiento_grupos_id($_POST['t_agrupamiento_grupos_id']);
            $aula->setNum_mesas($_POST['numero_mesas']);
            $aula->edit();
            header('Location: /gestor/aulas');
        } else {
            $aula = Aulas::getInstancia();
            $data = [
                'id' => $numero,
                'codigo' => $aula->get($numero)[0]['codigo'],
                't_agrupamiento_grupos_id' => $aula->get($numero)[0]['t_agrupamiento_grupos_id'],
                'numero_mesas' => $aula->get($numero)[0]['numero_mesas']
            ];
        }
        $this->renderHTML('../view/aulas/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $aula = Aulas::getInstancia();
        $aula->setId($numero);
        $aula->delete();
        header('Location: /');
    }

    public function AulaAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        $aula = Aulas::getInstancia();
        $incidencia = Incidencias::getInstancia();
        $equipos = Equipos::getInstancia();
        $profesor = Profesores::getInstancia();
        $ubicacion = Ubicacion::getInstancia();


        $data = [
            'id' => $numero,
            'aula_codigo' => $aula->get($numero)[0]['codigo'],
            'numero_mesas' => $aula->get($numero)[0]['numero_mesas'],
            'incidencias' => $incidencia->getAll(),
            'equipos' => $equipos->getAll(),
            'profesores' => $profesor->getAll(),
            'ubicacion' => $ubicacion->getUbicacionesAula($numero),
            'estados' => $equipos->getEstados()
        ];
        $this->renderHTML('../view/aulas/aulas_view.php', $data);
    }
}
