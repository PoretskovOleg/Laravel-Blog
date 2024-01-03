<?php

namespace App\Actions\Admin\ArticleCategories;

use App\Contracts\Admin\ArticleCategories\SaveActionContract;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Cache;

class SaveAction implements SaveActionContract
{
    public function __invoke(array $validatedData, ArticleCategory $category): void
    {
        if ($category->exists) {
            $category->update($validatedData);
        } else {
            ArticleCategory::query()->create($validatedData);
        }
        Cache::forget(ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY);
        Cache::forget(ArticleCategory::CACHE_KEY_CATEGORIES);
    }
}
