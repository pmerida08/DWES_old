<?php

namespace App\Controllers;

use App\Models\Blog;

class BlogController extends BaseController
{

    public function getAllBlogAction()
    {
        $blogs = Blog::all();
        return $this->renderHTML('../views/Pages/blogs_view.php', [
            'blogs' => $blogs
        ]);
    }
    public function addBlogAction($request)
    {
        $responseMessage = null;

        if ($request->getMethod() == 'POST') {
            try {

                $postData = $request->getParsedBody();
                $blog = new Blog();
                $blog->title = $postData['title'];
                $blog->blog = $postData['description'];
                $blog->tags = $postData['tag'];
                $blog->author = $postData['author'];

                // $files = $request->getUploadedFiles();
                // $image = $files['image'];
                // if ($image->getError() == UPLOAD_ERR_OK) {
                //     $fileName = $image->getClientFilename();
                //     $fileName = uniqid() . $fileName;
                //     $image->moveTo("img/$fileName");
                //     $blog->image = $fileName;
                // }

                $blog->save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('../views/Pages/addBlogs_view.php', [
            'responseMessage' => $responseMessage
        ]);
    }
}
