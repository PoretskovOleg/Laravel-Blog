<?php

namespace App\Contracts\Profile;

interface StoreActionContract
{
    public function __invoke(array $data): void;
}
