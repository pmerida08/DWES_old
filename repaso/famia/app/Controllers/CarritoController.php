<?php

namespace App\Controllers;

class CarritoController extends BaseController
{
    public function carritoAction()
    {
        $data = [];
        $this->renderHTML('../Views/carrito_view.php', $data);
    }

    public function addCarrito()
    {
        $data = [];
        $this->renderHTML('../Views/add_carrito.php', $data);
    }
    
    
}