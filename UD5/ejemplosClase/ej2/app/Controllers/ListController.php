<?php

namespace App\Controllers;

class ListController extends BaseController
{

    public function NumerosAction($request){
        $urlDecode = explode("/", $request);
        $data = array('encabezado' => 'lista_numeros',
                        'numeros' => array());

        $i = 1;
        $max = end($urlDecode)*2;
        while($i <= $max){
            if ($i%2== 0){
                $data['numeros'][] = $i;
                $i++;
            }
            $i++;
        }
        $this -> renderHTML('../app/Views/list_view.php', $data);
    }
}
?>