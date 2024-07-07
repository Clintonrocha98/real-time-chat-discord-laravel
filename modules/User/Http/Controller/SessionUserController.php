<?php

namespace Modules\User\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\User\Http\Requests\SessionUserRequest;

class SessionUserController extends Controller
{
    public function getSessionUserView()
    {
        return view('auth.login');
    }

    public function postSessionUser(SessionUserRequest $request)
    {
        $attributes = $request->validated();

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/guilds');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}