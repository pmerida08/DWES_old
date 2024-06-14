<?php

namespace App\Controllers;

class ProductosController extends BaseController
{
    public function listAction()
    {
        $data = [];
        $this->renderHTML('../Views/list_view.php', $data);
    }

    
}