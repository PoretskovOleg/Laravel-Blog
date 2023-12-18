<?php

namespace App\Http\Controllers;

use App\Contracts\Articles\IndexActionContract;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index(ArticleCategory $category, IndexActionContract $action): Factory|Application|View
    {
        return view('articles.list', $action($category, 6));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): Factory|Application|View
    {
        return view('articles.detail', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        Cache::forget(Article::CACHE_KEY_HOME_PAGE);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
