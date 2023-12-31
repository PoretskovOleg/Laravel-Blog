<?php

namespace App\Actions\Profile;

use App\Contracts\Profile\StoreActionContract;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StoreAction implements StoreActionContract
{
    public function __invoke(array $data): void
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $data = $this->updateAvatar($data, $authUser);
        $authUser->update($data);
    }

    private function updateAvatar(array $data, User $authUser): array
    {
        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            $data['avatar'] = request()->file('avatar')->store('images/users');
            if (!empty($authUser->avatar)) {
                Storage::delete($authUser->avatar);
            }
        }
        return $data;
    }
}
