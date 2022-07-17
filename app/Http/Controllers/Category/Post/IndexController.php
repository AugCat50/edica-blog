<?php

namespace App\Http\Controllers\Category\Post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        // $posts = $category->posts()->filter();

        return view('category.post.index', compact('posts', 'category'));
    }
}
