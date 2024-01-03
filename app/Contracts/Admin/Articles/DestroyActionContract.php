<?php

namespace App\Contracts\Admin\Articles;

use App\Models\Article;

interface DestroyActionContract
{
    public function __invoke(Article $article): void;
}
