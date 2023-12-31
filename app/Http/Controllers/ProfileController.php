<?php

namespace App\Http\Controllers;

use App\Contracts\Profile\DestroyAvatarActionContract;
use App\Contracts\Profile\IndexActionContract;
use App\Contracts\Profile\StoreActionContract;
use App\Contracts\Profile\StorePasswordActionContract;
use App\Http\Requests\ProfilePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index(IndexActionContract $action): Factory|Application|View
    {
        return view('profile', $action());
    }

    public function store(ProfileRequest $request, StoreActionContract $action): RedirectResponse
    {
        $action($request->validated());

        return back()->with(['profile_success' => true]);
    }

    public function destroyAvatar(DestroyAvatarActionContract $action): RedirectResponse
    {
        $action();
        return back();
    }

    public function storePassword(ProfilePasswordRequest $request, StorePasswordActionContract $action): RedirectResponse
    {
        $action($request->validated('new_password'));

        return back()->with([
            'active_tab' => 2,
            'password_success' => true
        ]);
    }
}
