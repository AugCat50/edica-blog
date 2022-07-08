<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return view('admin.categories.show', compact('user'));
    }
}
