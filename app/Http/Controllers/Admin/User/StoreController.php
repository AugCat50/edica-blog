<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\User\PasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Auth\Events\Registered;

class StoreController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(StoreRequest $request)
    {
        $data             = $request->validated();
        $password         = Str::random(10);
        $data['password'] = Hash::make($password);
        
        $user = User::firstOrCreate(['email' => $data['password']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password));

        //Отправляет письмо с верификацией почты
        event(new Registered($user));

        return redirect()->route('admin.user.index');
    }
}
