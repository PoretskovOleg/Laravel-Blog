<?php

namespace App\Actions\Profile;

use App\Contracts\Profile\DestroyAvatarActionContract;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DestroyAvatarAction implements DestroyAvatarActionContract
{
    public function __invoke(): void
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        if (!empty($authUser->avatar)) {
            Storage::delete($authUser->avatar);
            $authUser->update(['avatar' => null]);
        }
    }
}
