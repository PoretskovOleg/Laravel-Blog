<?php

namespace App\Actions\Admin\Articles;

use App\Contracts\Admin\Articles\SaveActionContract;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SaveAction implements SaveActionContract
{
    public function __invoke(array $validatedData, Article $article): void
    {
        if (request()->has('image') && request()->file('image')->isValid()) {
            $validatedData['preview_img'] = $validatedData['detail_img'] =
                request()->file('image')->store('images/articles');

            if ($article->exists && !empty($article->preview_img)) {
                Storage::delete($article->preview_img);
                Storage::delete($article->detail_img);
            }
        }
        unset($validatedData['image']);
        if ($article->exists) {
            $article->update($validatedData);
        } else {
            Article::query()->create($validatedData);
        }
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
    }
}
