<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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

//* Pass data to view by route
// Route::get("/", function () {
//     $title = "Learn Laravel PHP Framework";
//     $content = 'Learn Laravel 8x Framework';
//     $dataView = [
//         'title' => $title,
//         'content' => $content,
//     ];
//     return view('home', $dataView); //import and load view home.php file
// })->name('home');

//*Pass data to view by constroller
Route::middleware('auth.admin')->get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth.admin')->prefix('categories')->group(function () {

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


Route::get('san-pham/{id}', [HomeController::class, 'getDetail']);

Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::middleware('auth.admin.product')->resource('products', ProductsController::class);
});