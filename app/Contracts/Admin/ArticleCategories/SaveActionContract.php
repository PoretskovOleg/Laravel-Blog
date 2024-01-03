<?php

namespace App\Contracts\Admin\ArticleCategories;

use App\Models\ArticleCategory;

interface SaveActionContract
{
    public function __invoke(array $validatedData, ArticleCategory $category): void;
}
