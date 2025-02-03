<?php

namespace App\Controllers;

use App\Models\Alumnos;

class AlumnosController extends BaseController
{
    public function IndexAction()
    {
        $alumnos = Alumnos::getInstancia();
        $data = $alumnos->getAll();
        $this->renderHTML('../view/alumnos/alumnos_view.php', $data);
    }

    public function AddAction()
    {
        if (isset($_POST['submit'])) {
            $alumno = Alumnos::getInstancia();
            $alumno->setNombre($_POST['nombre']);
            $alumno->setEmail($_POST['email']);
            $alumno->setPassword($_POST['password']);
            $alumno->set();
            header('Location: /alumnos');
        }
        $this->renderHTML('../view/alumnos/add_view.php');
    }

    public function EditAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);

        if (isset($_POST['submit'])) {
            $alumno = Alumnos::getInstancia();
            $alumno->setId($numero);
            $alumno->setNombre($_POST['nombre']);
            $alumno->setEmail($_POST['email']);
            $alumno->setPassword($_POST['password']);
            $alumno->setActivo($_POST['activo']);
            $alumno->edit();
            header('Location: /gestor/alumnos');
        } else {
            $alumno = Alumnos::getInstancia();
            $data = [
                'id' => $numero,
                'nombre' => $alumno->get($numero)[0]['nombre'],
                'email' => $alumno->get($numero)[0]['email'],
                'password' => $alumno->get($numero)[0]['password'],
                'activo' => $alumno->get($numero)[0]['activo'] == 1 ? 'Activo' : 'Inactivo'
            ];
        }
        $this->renderHTML('../view/alumnos/edit_view.php', $data);
    }

    public function DeleteAction($url)
    {
        $url = explode('/', $url);
        $numero = end($url);
        $alumno = Alumnos::getInstancia();
        $alumno->setId($numero);
        $alumno->delete($numero);
        header('Location: /gestor/alumnos');
    }

    public function ImportAction($csv_file)
    {
        $alumnos = Alumnos::getInstancia();

        $csv_file = $_FILES['csv_file']['tmp_name'];
        $handle = fopen($csv_file, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $alumnos->setNombre($data[0]);
            $alumnos->setEmail($data[1]);
            $alumnos->setPassword($data[2]);
            $alumnos->setActivo($data[3]);
            $alumnos->set();
        }
        fclose($handle);
        header('Location: /gestor/alumnos');
    }

    public function ExportAction()
    {
        $alumnos = Alumnos::getInstancia();
        $data = $alumnos->getAll();

        $filename = 'alumnos.csv';


        if (($handle = fopen($filename, "w")) !== FALSE) {
            fputcsv($handle, array('Nombre', 'Email', 'Password', 'Activo'));
            foreach ($data as $alumno) {
                fputcsv($handle, array($alumno['nombre'], $alumno['email'], $alumno['password'], $alumno['activo'] == 1 ? 'Activo' : 'Inactivo'));
            }
            fclose($handle);

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($filename));
            readfile($filename);
            // header('Location: /gestor/alumnos');
        } else {
            echo 'Error al exportar';
        }
    }
}
