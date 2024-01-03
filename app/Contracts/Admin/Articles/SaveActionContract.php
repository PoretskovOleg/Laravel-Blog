<?php

namespace App\Contracts\Admin\Articles;

use App\Models\Article;

interface SaveActionContract
{
    public function __invoke(array $validatedData, Article $article): void;
}
