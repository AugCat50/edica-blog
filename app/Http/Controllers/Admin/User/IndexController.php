<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //Метод по умолчанию.
    public function __invoke()
    {
        $categories = User::all();

        return view('admin.categories.index', compact('categories'));
    }
}
