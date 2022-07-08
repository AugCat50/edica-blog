<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(User $user)
    {
        $user->delete();

        return redirect()->route('admin.category.index');
    }
}
