<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('category/{category}/articles', [ArticleController::class, 'index'])
    ->whereNumber('category')
    ->name('articles.index');

Route::resource('articles', ArticleController::class)
    ->whereNumber('article')
    ->except(['index']);
