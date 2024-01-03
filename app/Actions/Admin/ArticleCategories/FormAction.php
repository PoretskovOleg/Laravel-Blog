<?php

namespace App\Actions\Admin\ArticleCategories;

use App\Contracts\Admin\ArticleCategories\FormActionContract;
use App\Models\ArticleCategory;

class FormAction implements FormActionContract
{
    public function __invoke(ArticleCategory $category): array
    {
        return [
            'category' => $category,
        ];
    }
}
