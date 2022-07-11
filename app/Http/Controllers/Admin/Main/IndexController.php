<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $data = array();
        $data['userCount']     = User::all()    ->count();
        $data['categoryCount'] = Category::all()->count();
        $data['tagCount']      = Tag::all()     ->count();
        $data['postCount']     = Post::all()    ->count();

        return view('admin.main.index', compact('data'));
    }
}
