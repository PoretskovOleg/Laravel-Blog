<?php

namespace App\Actions\Profile;

use App\Contracts\Profile\StorePasswordActionContract;
use App\Models\User;

class StorePasswordAction implements StorePasswordActionContract
{
    public function __invoke(string $password): void
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $authUser->update(['password' => $password]);
    }
}
