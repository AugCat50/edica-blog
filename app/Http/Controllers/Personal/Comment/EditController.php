<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }
}
