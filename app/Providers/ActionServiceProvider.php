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

    ];
}
