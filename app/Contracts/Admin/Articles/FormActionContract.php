<?php

namespace App\Contracts\Admin\Articles;

use App\Models\Article;

interface FormActionContract
{
    public function __invoke(Article $article): array;
}
