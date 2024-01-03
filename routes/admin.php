<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin'])->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [ArticleController::class, 'index'])->name('home');
    Route::resource('/articles', ArticleController::class)->whereNumber('article');
    Route::resource('/categories', ArticleCategoryController::class)->whereNumber('category');
});
