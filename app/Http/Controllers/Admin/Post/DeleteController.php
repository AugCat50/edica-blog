<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DeleteController extends BaseController
{
    //Метод по умолчанию.
    public function __invoke(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
