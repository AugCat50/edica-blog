<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(User $user)
    {
        $roles = User::getRoles();

        return view('admin.user.edit', compact('roles', 'user'));
    }
}
