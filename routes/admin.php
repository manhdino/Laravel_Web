<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
//Route Admin(Guard)



Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/login-form', [AdminController::class, 'login_form'])->name('login.form');
    Route::post('/login-form', [AdminController::class, 'login_post'])->name('login.post');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::prefix('posts')->middleware(['auth', 'verified'])->name('posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/add', [PostController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        });
    });
});
