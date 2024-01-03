<?php

namespace App\Actions\Admin\ArticleCategories;

use App\Contracts\Admin\ArticleCategories\DestroyActionContract;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Cache;

class DestroyAction implements DestroyActionContract
{
    public function __invoke(ArticleCategory $category): void
    {
        $category->delete();
        Cache::forget(ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY);
        Cache::forget(ArticleCategory::CACHE_KEY_CATEGORIES);
    }
}
