<?php

namespace App\Actions\Articles;

use App\Contracts\Articles\IndexActionContract;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class IndexAction implements IndexActionContract
{
    public function __invoke(ArticleCategory $category, int $countPerPage): array
    {
        return [
            'articles' => $this->getArticles($category, $countPerPage),
            'activeCategory' => $category->id,
            'categories' => $this->getCategories()
        ];
    }

    private function getArticles(ArticleCategory $category, int $countPerPage): LengthAwarePaginator
    {
        return Article::query()
            ->with('category:id,name')
            ->where('article_category_id', $category->id)
            ->latest()
            ->paginate($countPerPage, ['id', 'article_category_id', 'name', 'preview']);
    }

    private function getCategories(): Collection|array
    {
        return Cache::rememberForever(ArticleCategory::CACHE_KEY_CATEGORIES, function () {
            return ArticleCategory::query()->oldest()->get(['id', 'name']);
        });
    }
}
