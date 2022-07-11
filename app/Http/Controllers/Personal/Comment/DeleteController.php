<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
