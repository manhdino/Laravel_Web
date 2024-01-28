<?php

use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes([
    'register' => false
]);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //posts
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('index');
        Route::get('/add', [PostsController::class, 'add'])->name('add');
    });

    //groups
    Route::prefix('groups')->name('groups.')->group(function () {
        Route::get('/', [GroupsController::class, 'index'])->name('index');
        Route::get('/add', [GroupsController::class, 'add'])->name('add');
    });

    //users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/add', [UsersController::class, 'add'])->name('add');
    });
});
