<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;

class EditController extends BaseController
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }
}
