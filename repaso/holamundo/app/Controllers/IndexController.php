<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $data = ['message' => 'Hola Mundo'];

        $this->renderHTML('../Views/index_view.php', $data);
    }

    public function saludo(){
        $data = ['message' => 'Bienvenido, ', 'name' => 'Jose'];

        $this->renderHTML('../Views/saludo_view.php', $data);
    }
    
    public function numPar($request){
        $request = ltrim($request, '/');
        
        $num = intval($request);
        $par = $num % 2 == 0 ? 'par' : 'impar';
        $data = ['request' => $num, 'par' => $par];

        $this->renderHTML('../Views/numPar_view.php', $data);
    }
}
