<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(Category $category)
    {
        // $categories = Category::all();

        return view('admin.categories.edit', compact('category'));
        // return 'category';
    }
}
