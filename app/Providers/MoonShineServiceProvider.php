<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\MoonShine\Resources\ArticleCategoryResource;
use App\MoonShine\Resources\ArticleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuGroup::make('Блог', [
                MenuItem::make('Категории', new ArticleCategoryResource())->badge(
                    fn() => ArticleCategory::query()->count()
                ),

                MenuItem::make('Статьи', new ArticleResource())->badge(
                    fn() => Article::query()->count()
                )
            ])
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
