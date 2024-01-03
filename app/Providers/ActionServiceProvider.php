<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        \App\Contracts\HomeActionContract::class => \App\Actions\HomeAction::class,

        \App\Contracts\Articles\IndexActionContract::class => \App\Actions\Articles\IndexAction::class,

        \App\Contracts\Profile\IndexActionContract::class => \App\Actions\Profile\IndexAction::class,
        \App\Contracts\Profile\StoreActionContract::class => \App\Actions\Profile\StoreAction::class,
        \App\Contracts\Profile\DestroyAvatarActionContract::class => \App\Actions\Profile\DestroyAvatarAction::class,
        \App\Contracts\Profile\StorePasswordActionContract::class => \App\Actions\Profile\StorePasswordAction::class,

        \App\Contracts\Admin\Articles\IndexActionContract::class => \App\Actions\Admin\Articles\IndexAction::class,
        \App\Contracts\Admin\Articles\FormActionContract::class => \App\Actions\Admin\Articles\FormAction::class,
        \App\Contracts\Admin\Articles\SaveActionContract::class => \App\Actions\Admin\Articles\SaveAction::class,
        \App\Contracts\Admin\Articles\DestroyActionContract::class => \App\Actions\Admin\Articles\DestroyAction::class,

        \App\Contracts\Admin\ArticleCategories\IndexActionContract::class => \App\Actions\Admin\ArticleCategories\IndexAction::class,
        \App\Contracts\Admin\ArticleCategories\FormActionContract::class => \App\Actions\Admin\ArticleCategories\FormAction::class,
        \App\Contracts\Admin\ArticleCategories\SaveActionContract::class => \App\Actions\Admin\ArticleCategories\SaveAction::class,
        \App\Contracts\Admin\ArticleCategories\DestroyActionContract::class => \App\Actions\Admin\ArticleCategories\DestroyAction::class,
    ];
}
