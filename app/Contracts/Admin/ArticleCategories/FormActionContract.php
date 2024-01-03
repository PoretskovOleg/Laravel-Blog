<?php

namespace App\Contracts\Admin\ArticleCategories;

use App\Models\ArticleCategory;

interface FormActionContract
{
    public function __invoke(ArticleCategory $category): array;
}
