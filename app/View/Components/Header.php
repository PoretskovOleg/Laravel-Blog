<?php

namespace App\View\Components;

use App\Models\ArticleCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Header extends Component
{
    public ?int $defaultCategory;

    public function __construct()
    {
        $this->defaultCategory = Cache::rememberForever(
            ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY,
            function () {
                return ArticleCategory::query()->oldest()->value('id');
            }
        );
    }

    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
