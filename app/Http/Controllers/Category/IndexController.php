<?php

namespace App\Http\Controllers\Category;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию. Пока главной страницы нет, редиректит в контроллер вывода постов
    public function __invoke()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }
}
