<?php


namespace App\Controllers;

use App\Models\Productos;


class ProductosController extends BaseController
{
    public function index()
    {
        $productos = Productos::getInstancia();
        $data = $productos->getAll();
        $this->renderHTML('../view/index_view.php', $data);
    }

    public function show($id)
    {
        $productos = Productos::getInstancia();
        $resultado = $productos->get($id);
        return $resultado;
    }

    public function store($nombre, $precio, $imagen)
    {
        $productos = Productos::getInstancia();
        $productos->setNombre($nombre);
        $productos->setImagen($imagen);
        $productos->setPrecio($precio);
        $productos->set();
        return $productos->getMensaje();
    }

    public function edit()
    {
        $productos = Productos::getInstancia();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productos->setId($_POST['id']);
                $productos->setNombre($_POST['nombre']);
                $productos->setPrecio($_POST['precio']);
                $productos->setImagen($_POST['imagen']);
                $productos->edit();
                header('Location: /');
            } 

            $data = [
                'id' => $_GET['id'],
                'nombre' => $productos->get($_GET['id'])[0]['nombre'],
                'precio' => $productos->get($_GET['id'])[0]['precio'],
                'imagen' => $productos->get($_GET['id'])[0]['imagen']
            ];

        $this->renderHTML('../view/edit_view.php', $data);
    }

    public function destroy($id)
    {
        $productos = Productos::getInstancia();
        $productos->setId($id);
        $productos->delete();
        return $productos->getMensaje();
    }
}
