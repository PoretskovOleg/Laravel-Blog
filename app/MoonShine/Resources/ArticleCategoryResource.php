<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategory;

use Illuminate\Support\Facades\Cache;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class ArticleCategoryResource extends ModelResource
{
    protected string $model = ArticleCategory::class;

    protected string $title = 'Категории';

    protected array $with = ['articles'];

    protected string $column = 'name';

    protected string $sortColumn = 'name';

    protected string $sortDirection = 'ASC';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make(),
                Text::make('Название', 'name')->required()->sortable(),
                Text::make('Количество статей', null, fn($item) => $item->articles->count())->hideOnForm(),
                Date::make('Дата создания', 'created_at')->format('d.m.Y H:i')->hideOnForm()->sortable(),
                Date::make('Дата изменения', 'updated_at')->format('d.m.Y H:i')->hideOnForm()->sortable()
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string', 'max:255']
        ];
    }

    protected function afterCreated(Model $item): Model
    {
        Cache::forget(ArticleCategory::CACHE_KEY_CATEGORIES);
        Cache::forget(ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY);
        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {
        Cache::forget(ArticleCategory::CACHE_KEY_CATEGORIES);
        Cache::forget(ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY);
        return $item;
    }

    protected function afterDeleted(Model $item): Model
    {
        Cache::forget(ArticleCategory::CACHE_KEY_CATEGORIES);
        Cache::forget(ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY);
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
        return $item;
    }
}
