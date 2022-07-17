<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        //toggle - переключатель. Если лайка нет - добавит, иначе удалит
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}
