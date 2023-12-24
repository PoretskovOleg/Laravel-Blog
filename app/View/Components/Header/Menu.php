<?php

namespace App\View\Components\Header;

use App\Models\ArticleCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Menu extends Component
{
    public function menuItems(): array
    {
        $menuItems = [];

        $defaultCategory = Cache::rememberForever(
            ArticleCategory::CACHE_KEY_DEFAULT_CATEGORY,
            function () {
                return ArticleCategory::query()->oldest()->value('id');
            }
        );

        if (isset($defaultCategory)) {
            $menuItems[] = [
                'route' => route('articles.index', ['category' => $defaultCategory]),
                'name' => 'Статьи'
            ];
        }

        return $menuItems;
    }

    public function render(): View|Closure|string
    {
        return view('components.header.menu');
    }
}
