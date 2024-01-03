<?php

namespace App\Contracts\Admin\Articles;

interface IndexActionContract
{
    public function __invoke(int $countPerPage): array;
}
