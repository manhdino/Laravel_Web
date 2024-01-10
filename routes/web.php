<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('products', [ProductsController::class, 'index']); //index function of ProductsController

// Route::get('/products/{productName}', [ProductsController::class, 'detail']);//detail function of ProductsController

Route::prefix('categories')->group(function () {

    // Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    // Lấy chi tiết 1 chuyên mục áp dụng show sửa chuyên mục
    Route::get('edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    // Xử lý update chuyên mục 
    Route::post('edit/{id}', [CategoriesController::class, 'updateCategory']);

    // Hiển thị form add dữ liệu 
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Xử lý thêm chuyên mục 
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xóa chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});
