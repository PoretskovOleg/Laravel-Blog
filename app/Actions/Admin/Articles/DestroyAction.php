<?php

namespace App\Actions\Admin\Articles;

use App\Contracts\Admin\Articles\DestroyActionContract;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class DestroyAction implements DestroyActionContract
{
    public function __invoke(Article $article): void
    {
        if (!empty($article->preview_img)) {
            Storage::delete($article->preview_img);
        }
        if (!empty($article->detail_img)) {
            Storage::delete($article->detail_img);
        }
        $article->delete();
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
    }
}
