<?php

namespace App\Contracts\Admin\ArticleCategories;

interface IndexActionContract
{
    public function __invoke(int $countPerPage): array;
}
