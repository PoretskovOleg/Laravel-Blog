<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(): Factory|Application|View
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        return view('profile', [
            'avatar' => $authUser->avatar_path,
            'issetAvatar' => !empty($authUser->avatar),
            'email' => $authUser->email,
            'name' => $authUser->name,
        ]);
    }

    public function store(ProfileRequest $request): RedirectResponse
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $userData = $request->validated();
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $userData['avatar'] = $request->file('avatar')->store('images/users');
            if (!empty($authUser->avatar)) {
                Storage::delete($authUser->avatar);
            }
        }

        $authUser->update($userData);

        return back()->with([
            'activeTab' => 1,
            'form_1' => 'success'
        ]);
    }

    public function destroyAvatar(): RedirectResponse
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        if (!empty($authUser->avatar)) {
            Storage::delete($authUser->avatar);
            $authUser->update(['avatar' => null]);
        }

        return back()->with([
            'activeTab' => 1,
        ]);
    }

    public function storePassword(ProfilePasswordRequest $request): RedirectResponse
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $authUser->update(['password' => $request->validated('new_password')]);

        return back()->with([
            'activeTab' => 2,
            'form_2' => 'success'
        ]);
    }
}
