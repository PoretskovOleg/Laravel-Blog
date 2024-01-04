<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use MoonShine\Fields\Date;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Статьи';

    protected array $with = ['category'];

    protected string $column = 'title';

    protected string $sortColumn = 'title';

    protected string $sortDirection = 'ASC';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make(),
                BelongsTo::make('Категория', 'category', resource: new ArticleCategoryResource())->required(),
                Text::make('Заголовок', 'title')->required()->sortable(),
                Textarea::make('Текст статьи', 'text')->required()->hideOnIndex(),
                Image::make('Изображение для карточки', 'preview_img')->dir('images/articles'),
                Image::make('Детальное изображение', 'detail_img')->dir('images/articles')->hideOnIndex(),
                Date::make('Дата создания', 'created_at')->format('d.m.Y H:i')->hideOnForm()->sortable(),
                Date::make('Дата изменения', 'updated_at')->format('d.m.Y H:i')->hideOnForm()->sortable()
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('article_categories', 'id')],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'min:25'],
            'preview_img' => ['image'],
            'detail_img' => ['image'],
        ];
    }

    public function filters(): array
    {
        return [
            BelongsTo::make('Категория', 'category', resource: new ArticleCategoryResource())->nullable(),
            DateRange::make('Дата создания', 'created_at')
        ];
    }

    protected function afterCreated(Model $item): Model
    {
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
        return $item;
    }

    protected function afterDeleted(Model $item): Model
    {
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
        return $item;
    }
}
