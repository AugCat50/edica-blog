<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class CreateController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }
}
