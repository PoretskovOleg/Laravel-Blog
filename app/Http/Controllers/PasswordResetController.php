<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordForgotRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function forgotPasswordForm(): Factory|Application|View
    {
        return view('auth.forgot');
    }

    public function forgotPassword(PasswordForgotRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink($request->validated());

        return $status == Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordForm(Request $request, string $token): Factory|Application|View
    {
        return view('auth.reset', [
            'token' => $token,
            'email' => $request->get('email')
        ]);
    }

    public function resetPassword(PasswordResetRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only(['token', 'email', 'password', 'password_confirmation']),
            function (User $user, string $password) {
                $user->forceFill(['password' => $password])->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
