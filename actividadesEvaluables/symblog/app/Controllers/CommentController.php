<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $model = new Comment;

        $comments = $model->paginate(3);

        // return $comments;

        return $this->view('comments/index', compact('comments'));
        // compact('comments') es igual a ['comments' => $comments]
    }

    public function create()
    {
        return $this->view('comments/create');
    }

    public function store()
    {
        $data = $_POST;

        $model = new Comment;

        $model->create($data);

        return $this->redirect('/comments');
    }

    public function show($id)
    {
        $model = new Comment;

        $comment = $model->find($id);

        return $this->view('comments.show', compact('comment'));
    }

    public function edit($id)
    {
        $model = new Comment;

        $comment = $model->find($id);

        return $this->view('comments.edit', compact('comment'));
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Comment;

        $model->update($id, $data);

        return $this->redirect("/comments/{$id}");
    }

    public function destroy($id)
    {
        $model = new Comment;

        $model->delete($id);

        return $this->redirect('/comments');
    }
}
