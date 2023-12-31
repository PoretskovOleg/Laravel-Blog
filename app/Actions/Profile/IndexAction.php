<?php

namespace App\Actions\Profile;

use App\Contracts\Profile\IndexActionContract;
use App\Models\User;

class IndexAction implements IndexActionContract
{
    public function __invoke(): array
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        return [
            'avatar' => $authUser->avatar_path,
            'issetAvatar' => !empty($authUser->avatar),
            'email' => $authUser->email,
            'name' => $authUser->name,
        ];
    }
}
