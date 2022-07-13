<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $posts       = Post::paginate(6);
        $randomPosts = Post::get()->random(4);

        //Считает количество лайков у поста в таблице отношения, сортирует по убыванию, получает коллекцию, берёт первые 4 объекта из коллекции
        $likedPosts  = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
