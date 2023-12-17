<?php

namespace App\Contracts\Articles;

use App\Models\ArticleCategory;

interface IndexActionContract
{
    public function __invoke(ArticleCategory $category): array;
}
