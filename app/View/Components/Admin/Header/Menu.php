<?php

namespace App\View\Components\Admin\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public function menuItems(): array
    {
        return [
            [
                'route' => route('admin.articles.index'),
                'name' => 'Статьи'
            ],
            [
                'route' => route('admin.categories.index'),
                'name' => 'Категории'
            ]
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.header.menu');
    }
}
