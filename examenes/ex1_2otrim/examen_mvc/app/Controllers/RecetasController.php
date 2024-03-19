<?php

namespace App\Controllers;

use App\Models\Recetas;

class RecetasController extends Controller
{
    public function index()
    {
        $model = new Recetas();

        $recetas = $model->all();

        // return $recetas;

        return $this->view('recetas/index', compact('recetas'));
        // compact('recetas') es igual a ['recetas' => $recetas]
    }

    public function create()
    {
        return $this->view('recetas/create');
    }

    public function store()
    {
        $data = $_POST;

        $model = new Recetas();

        $model->create($data);

        return $this->redirect('/recetas');
    }

    public function show($id)
    {
        $model = new Recetas();

        $receta = $model->find($id);

        return $this->view('recetas.show', compact('receta'));
    }

    public function edit($id)
    {
        $model = new Recetas();

        $receta = $model->find($id);

        return $this->view('recetas.edit', compact('receta'));
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Recetas();

        $model->update($id, $data);

        return $this->redirect("/recetas/{$id}");
    }

    public function destroy($id)
    {
        $model = new Recetas();

        $model->delete($id);

        return $this->redirect('/recetas');
    }
}
