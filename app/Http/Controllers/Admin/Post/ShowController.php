<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
