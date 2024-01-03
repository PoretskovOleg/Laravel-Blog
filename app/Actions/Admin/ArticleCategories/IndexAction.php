<?php

namespace App\Actions\Admin\ArticleCategories;

use App\Contracts\Admin\ArticleCategories\IndexActionContract;
use App\Models\ArticleCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IndexAction implements IndexActionContract
{
    public function __invoke(int $countPerPage): array
    {
        return [
            'categories' => $this->getCategories($countPerPage)
        ];
    }

    private function getCategories(int $countPerPage): LengthAwarePaginator
    {
        return ArticleCategory::query()
            ->orderBy('name')
            ->withCount('articles')
            ->paginate($countPerPage, ['id', 'name', 'created_at', 'updated_at']);
    }
}
