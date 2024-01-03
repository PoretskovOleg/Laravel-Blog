<?php

namespace App\Actions\Admin\Articles;

use App\Contracts\Admin\Articles\FormActionContract;
use App\Models\Article;
use App\Models\ArticleCategory;

class FormAction implements FormActionContract
{
    public function __invoke(Article $article): array
    {
        return [
            'article' => $article,
            'categories' => ArticleCategory::query()->orderBy('name')->get(['id', 'name'])
        ];
    }
}
