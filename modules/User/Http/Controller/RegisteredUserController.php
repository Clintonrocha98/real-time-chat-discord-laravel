<?php

namespace Modules\User\Http\Controller;

use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Model\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function getRegisteredView()
    {
        return view('auth.register');
    }

    public function postRegistered(RegisterUserRequest $request, User $user)
    {
        $attributes = $request->validated();

        $newUser = $user->create($attributes);

        Auth::login($newUser);

        return redirect('/guilds');
    }
}