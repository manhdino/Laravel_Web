<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');

    Route::get('/{id}', [UsersController::class, 'detail'])->name('detail');

    Route::post('/', [UsersController::class, 'create'])->name('create');

    Route::put('/{id}', [UsersController::class, 'update'])->name('update-put');

    Route::patch('/{id}', [UsersController::class, 'update'])->name('update-patch');

    Route::delete('/{user}', [UsersController::class, 'delete'])->name('delete');
});
