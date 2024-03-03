<?php

namespace App\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $model = new Blog;

        $blog = $model->paginate(3);

        // return $blog;

        return $this->view('blog/index', compact('blog'));
        // compact('blog') es igual a ['blog' => $blog]
    }

    public function create()
    {
        return $this->view('blog/create');
    }

    public function store()
    {
        $data = $_POST;

        $model = new Blog;

        $model->create($data);

        return $this->redirect('/blog');
    }

    public function show($id)
    {
        $model = new Blog;

        $contact = $model->find($id);

        return $this->view('blog.show', compact('contact'));
    }

    public function edit($id)
    {
        $model = new Blog;

        $contact = $model->find($id);

        return $this->view('blog.edit', compact('contact'));
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Blog;

        $model->update($id, $data);

        return $this->redirect("/blog/{$id}");
    }

    public function destroy($id)
    {
        $model = new Blog;

        $model->delete($id);

        return $this->redirect('/blog');
    }

}
