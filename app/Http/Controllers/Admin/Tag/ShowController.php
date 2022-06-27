<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Tag $category)
    {
        return view('admin.tags.show', compact('tag'));
    }
}
