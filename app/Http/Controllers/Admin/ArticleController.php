<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\Articles\DestroyActionContract;
use App\Contracts\Admin\Articles\FormActionContract;
use App\Contracts\Admin\Articles\IndexActionContract;
use App\Contracts\Admin\Articles\SaveActionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(IndexActionContract $action): Factory|Application|View
    {
        return view('admin.articles.list', $action(5));
    }

    public function create(FormActionContract $action): Factory|Application|View
    {
        return view('admin.articles.form', $action(new Article()));
    }

    public function store(StoreArticleRequest $request, SaveActionContract $action): RedirectResponse
    {
        $action($request->validated(), new Article());
        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article, FormActionContract $action): Factory|Application|View
    {
        return view('admin.articles.form', $action($article));
    }

    public function update(UpdateArticleRequest $request, Article $article, SaveActionContract $action): RedirectResponse
    {
        $action($request->validated(), $article);
        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article, DestroyActionContract $action): RedirectResponse
    {
        $action($article);
        return back();
    }
}
