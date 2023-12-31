<?php

namespace App\Contracts\Profile;

interface StorePasswordActionContract
{
    public function __invoke(string $password): void;
}
