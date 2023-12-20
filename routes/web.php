<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register');

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('category/{category}/articles', [ArticleController::class, 'index'])
    ->whereNumber('category')
    ->name('articles.index');

Route::resource('articles', ArticleController::class)
    ->whereNumber('article')
    ->except(['index']);
