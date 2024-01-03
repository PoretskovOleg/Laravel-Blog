<?php

namespace App\Contracts\Admin\ArticleCategories;

use App\Models\ArticleCategory;

interface DestroyActionContract
{
    public function __invoke(ArticleCategory $category): void;
}
