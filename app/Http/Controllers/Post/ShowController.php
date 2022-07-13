<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ShowController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        // Carbon::setLocale('ru_RU');
        $date         = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);

        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
