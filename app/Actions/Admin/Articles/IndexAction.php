<?php

namespace App\Actions\Admin\Articles;

use App\Contracts\Admin\Articles\IndexActionContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IndexAction implements IndexActionContract
{
    public function __invoke(int $countPerPage): array
    {
        return [
            'articles' => $this->getArticles($countPerPage)
        ];
    }

    private function getArticles(int $countPerPage): LengthAwarePaginator
    {
        return Article::query()
            ->with('category:id,name')
            ->latest()
            ->paginate($countPerPage, ['id', 'title', 'category_id', 'preview_img', 'created_at', 'updated_at']);
    }
}
