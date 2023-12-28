<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function register(): Factory|Application|View
    {
        return view('auth.register');
    }

    public function store(ProfileRequest $request): RedirectResponse
    {
        User::query()->create($request->validated());

        return redirect()->route('login');
    }

    public function login(): Factory|Application|View
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated())) {
            return back()->withErrors([
                'email' => 'Неверные авторизационные данные'
            ]);
        }

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
