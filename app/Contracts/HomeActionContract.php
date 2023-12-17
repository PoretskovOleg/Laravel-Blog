<?php

namespace App\Contracts;

interface HomeActionContract
{
    public function __invoke(int $count): array;
}
