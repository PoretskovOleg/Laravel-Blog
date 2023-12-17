<?php

namespace App\Actions\Articles;

use App\Contracts\Articles\IndexActionContract;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class IndexAction implements IndexActionContract
{
    public function __invoke(ArticleCategory $category): array
    {
        return [
            'articles' => $this->getArticles($category),
            'activeCategory' => $category->id,
            'categories' => $this->getCategories()
        ];
    }

    private function getArticles(ArticleCategory $category): LengthAwarePaginator
    {
        return Article::query()
            ->with('category:id,name')
            ->where('article_category_id', $category->id)
            ->latest('id')
            ->paginate(4, ['id', 'article_category_id', 'name', 'preview']);
    }

    private function getCategories(): Collection|array
    {
        return ArticleCategory::query()->oldest('id')->get(['id', 'name']);
    }
}
