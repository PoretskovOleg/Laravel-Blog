<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register');

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login');

    Route::get('forgot-password', [PasswordResetController::class, 'forgotPasswordForm'])->name('password.forgot');
    Route::post('forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('password.forgot');

    Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'store'])->name('profile.index');
    Route::delete('profile/avatar', [ProfileController::class, 'destroyAvatar'])->name('profile.avatar');
    Route::put('profile/password', [ProfileController::class, 'storePassword'])->name('profile.password');
});

Route::get('category/{category}/articles', [ArticleController::class, 'index'])
    ->whereNumber('category')
    ->name('articles.index');

Route::get('articles/{article}', [ArticleController::class, 'show'])
    ->whereNumber('article')
    ->name('articles.show');
