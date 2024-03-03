<?php

namespace App\Models;

class Blog extends DBAbstractModel 
{
    protected $table = 'blog';
    protected $id;
    protected $title;
    protected $author;
    protected $blog;
    protected $image;
    protected $tags;
    protected $created;
    protected $updated;

}
