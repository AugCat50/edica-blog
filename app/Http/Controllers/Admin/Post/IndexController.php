<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }
}
