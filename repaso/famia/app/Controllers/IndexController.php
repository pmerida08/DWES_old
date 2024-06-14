<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $data = ['message' => 'Hola Mundo'];

        $this->renderHTML('../Views/index_view.php', $data);
    }

    
}
