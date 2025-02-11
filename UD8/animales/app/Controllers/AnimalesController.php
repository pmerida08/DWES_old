<?php

namespace App\Controllers;

use App\Models\Animales;

class AnimalesController extends BaseController
{
    public function IndexAction($filter)
    {
        $animal = Animales::getInstance();

        $data["animales"] = $animal->getMascotasByFilter($filter);

        if (empty($data["animales"])) {
            require_once '../app/Views/animales_view.php';
        } else {
            require_once '../app/Views/list.animales.view.php';
        }
    }
}
