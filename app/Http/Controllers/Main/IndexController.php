<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию. Пока главной страницы нет, редиректит в контроллер вывода постов
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}
