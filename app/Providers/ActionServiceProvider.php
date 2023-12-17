<?php

namespace App\Providers;

use App\Actions\Articles\IndexAction;
use App\Actions\HomeAction;
use App\Contracts\Articles\IndexActionContract;
use App\Contracts\HomeActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        HomeActionContract::class => HomeAction::class,
        IndexActionContract::class => IndexAction::class
    ];
}
