<?php

namespace App\Controllers;

use App\Models\Ubicacion;

class UbicacionController extends BaseController
{

    public function changeAction()
    {
        
        if (isset($_POST)) {
            $ubicacion = Ubicacion::getInstancia();
            
            // var_dump($_POST);
            if (empty($_POST['equipo'])){
                $ubicacion->deletePorPuestoIdAula($_POST['puesto'], $_POST['aulas_id']);
                header('Location: /aulas/'.$_POST['aulas_id']);   
            }

            if ($ubicacion->existeUbicacionPorPuesto($_POST['puesto'], $_POST['aulas_id'])) {
                if($ubicacion->existeUbicacionPorEquipo($_POST['equipo'])){
                    $ubicacion->deleteIdEquipo($_POST['equipo']);
                }
                $ubicacion->setPuesto($_POST['puesto']);
                $ubicacion->setAulas_id($_POST['aulas_id']);
                $ubicacion->setEquipos_id($_POST['equipo']);
                $ubicacion->edit();

            } else {
                if($ubicacion->existeUbicacionPorEquipo($_POST['equipo'])){
                    $ubicacion->deleteIdEquipo($_POST['equipo']);
                }
                $ubicacion->setPuesto($_POST['puesto']);
                $ubicacion->setAulas_id($_POST['aulas_id']);
                $ubicacion->setEquipos_id($_POST['equipo']);
                $ubicacion->set();
            }

            header('Location: /aulas/'.$_POST['aulas_id']);
            
        } else {
            header('Location: /');
        }
    }
}
