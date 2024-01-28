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

        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::prefix('posts')->middleware(['auth', 'verified'])->name('posts.')->group(function () { //thêm middleware này để bắt người dùng phải đăng nhập thành công
            //tức là cả admin và người dùng phải đã đăng nhập thành công
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/add', [PostController::class, 'add'])->name('add')->can('post.add');
            Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit')->middleware('can:post.edit,post');
            Route::get('/detail/{post}', [PostController::class, 'detail'])->name('detail');
        });
    });
});
