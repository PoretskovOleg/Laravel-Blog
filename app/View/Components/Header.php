<?php

namespace App\View\Components;

use App\Models\ArticleCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public function defaultCategory()
    {
        return ArticleCategory::query()->orderBy('id')->value('id');
    }

    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
