<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
//Route Admin(Guard)



Route::prefix('admin')->name('login.')->group(function () {
    Route::get('/', function () {
        return '<h1>Admin Welcome</h1>';
    });
    Route::get('login-form', [AdminController::class, 'login_form'])->name('form');
    Route::post('login-form', [AdminController::class, 'login_post'])->name('post');
});
Route::group(['middleware' => 'admin'], function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
})->prefix('admin');
