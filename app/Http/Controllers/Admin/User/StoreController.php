<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(StoreRequest $request)
    {
        $data             = $request->validated();
        $data['password'] = Hash::make($data['password']);
        
        User::firstOrCreate(['email' => $data['password']], $data);

        return redirect()->route('admin.user.index');
    }
}
