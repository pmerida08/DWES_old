<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function aboutAction()
    {
        return $this->renderHTML('../views/Pages/about_view.php');
    }

    // public function addBlogAction($request)
    // {
    //     $responseMessage = null;

    //     if ($request->getMethod() == 'POST') {
    //         $postData = $request->getParsedBody();
    //         $blog = new Blog();
    //         $blog->title = $postData['title'];
    //         $blog->content = $postData['content'];
    //         $blog->save();

    //         $responseMessage = 'Saved';
    //     }

    //     return $this->renderHTML('addBlog.twig', [
    //         'responseMessage' => $responseMessage
    //     ]);
    // }
}