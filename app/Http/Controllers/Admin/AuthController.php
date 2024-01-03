<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function loginForm(): Factory|Application|View
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!auth('admin')->attempt($request->validated())) {
            return back()->withErrors([
                'login' => 'Неверные авторизационные данные'
            ]);
        }

        return redirect()->route('admin.index');
    }

    public function logout(): RedirectResponse
    {
        auth('admin')->logout();

        return redirect()->route('home');
    }
}
