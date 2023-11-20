<?php 
namespace App\Controllers;

class IndexController extends BaseController {
    public function IndexAction() {
        $data = ["message" => "Hola Mundo"];
        $this->renderHTML("../app/Views/index_view.php", $data);
    }
    
    public function SaludaAction($request) {
        $urlDecode = explode("/",$request);
        $data = ["message"=> "Saludos...".end($urlDecode)];
        $this->renderHTML("../app/Views/index_view.php", $data);
    }

}
?>