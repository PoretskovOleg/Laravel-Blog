<?php

namespace App\Actions;

use App\Contracts\HomeActionContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

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
        return Cache::rememberForever(Article::CACHE_KEY_HOME_PAGE, function () use ($count) {
            return Article::query()
                ->with('category:id,name')
                ->limit($count)
                ->latest()
                ->get(['id', 'name', 'preview', 'category_id']);
        });
    }
}
