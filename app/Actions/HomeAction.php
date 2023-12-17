<?php

namespace App\Actions;

use App\Contracts\HomeActionContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class HomeAction implements HomeActionContract
{
    public function __invoke(int $count): array
    {
        return [
            'articles' => $this->getArticles($count),
        ];
    }

    private function getArticles(int $count): Collection|array
    {
        return Article::query()
            ->with('category:id,name')
            ->limit($count)
            ->inRandomOrder()
            ->get(['id', 'name', 'preview', 'article_category_id']);
    }
}
