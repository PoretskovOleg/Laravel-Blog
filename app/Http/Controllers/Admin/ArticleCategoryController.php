<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\ArticleCategories\DestroyActionContract;
use App\Contracts\Admin\ArticleCategories\FormActionContract;
use App\Contracts\Admin\ArticleCategories\IndexActionContract;
use App\Contracts\Admin\ArticleCategories\SaveActionContract;
use App\Http\Requests\Admin\StoreArticleCategoryRequest;
use App\Http\Requests\Admin\UpdateArticleCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ArticleCategoryController extends Controller
{
    public function index(IndexActionContract $action): Factory|Application|View
    {
        return view('admin.article_categories.list', $action(5));
    }

    public function create(FormActionContract $action): Factory|Application|View
    {
        return view('admin.article_categories.form', $action(new ArticleCategory()));
    }

    public function store(StoreArticleCategoryRequest $request, SaveActionContract $action): RedirectResponse
    {
        $action($request->validated(), new ArticleCategory());
        return redirect()->route('admin.categories.index');
    }

    public function edit(ArticleCategory $category, FormActionContract $action): Factory|Application|View
    {
        return view('admin.article_categories.form', $action($category));
    }

    public function update(UpdateArticleCategoryRequest $request, ArticleCategory $category, SaveActionContract $action): RedirectResponse
    {
        $action($request->validated(), $category);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(ArticleCategory $category, DestroyActionContract $action): RedirectResponse
    {
        $action($category);
        return back();
    }
}
