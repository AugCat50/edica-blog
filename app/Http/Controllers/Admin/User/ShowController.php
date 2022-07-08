<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(User $user)
    {
        return view('admin.categories.show', compact('user'));
    }
}
