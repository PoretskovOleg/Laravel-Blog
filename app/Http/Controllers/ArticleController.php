<?php

namespace App\Http\Controllers;

use App\Contracts\Articles\IndexActionContract;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ArticleController extends Controller
{
    public function index(ArticleCategory $category, IndexActionContract $action): Factory|Application|View
    {
        return view('articles.list', $action($category, 6));
    }

    public function show(Article $article): Factory|Application|View
    {
        return view('articles.detail', ['article' => $article]);
    }
}
