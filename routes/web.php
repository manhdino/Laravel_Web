<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


// Admin
// Route::middleware('auth.admin')->get('errors', function () {
//     return view('errors.404');
// })->name('errors');

// Route::middleware('auth.admin')->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
//     Route::get('products', [HomeController::class, 'listProducts'])->name('home.products');
//     Route::get('product/add', [HomeController::class, 'addProduct'])->name('home.product.add');
//     Route::post('product/add', [HomeController::class, 'handleAddProduct']);
//     Route::put('product/add', [HomeController::class, '<u></u>pdateProduct']);
// });

// Route::middleware('auth.admin')->prefix('admin')->group(function () {

//     // Danh sách chuyên mục
//     Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

//     // Lấy chi tiết 1 chuyên mục áp dụng show sửa chuyên mục
//     Route::get('edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

//     // Xử lý update chuyên mục 
//     Route::post('edit/{id}', [CategoriesController::class, 'updateCategory']);

//     // Hiển thị form add dữ liệu 
//     Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

//     //Xử lý thêm chuyên mục 
//     Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

//     //Xóa chuyên mục
//     Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');

//     Route::get('/upload', [CategoriesController::class, 'getFile'])->name('categories.getFile');
//     //Xử lý file:
//     Route::post('/upload', [CategoriesController::class, 'handleFile'])->name('categories.uploadFile');
// });


//Users

// Route::prefix('users')->name('users.')->group(function () {
//     Route::get('/', [UserController::class, 'index'])->name('index');
//     Route::get('/add', [UserController::class, 'add'])->name('add');
//     Route::post('/add', [UserController::class, 'postAdd'])->name('post-add');
//     Route::get('/update/{id}', [UserController::class, 'update'])->name('update');
//     Route::post('/update', [UserController::class, 'postUpdate'])->name('post-update');
//     Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
//     Route::get('/learn-relation', [UserController::class, 'relations'])->name('learn-relation');
// });


//Posts
// Route::prefix('posts')->name('posts.')->group(function () {
//     Route::get('/', [PostController::class, 'index'])->name('index');
//     Route::get('/add', [PostController::class, 'add'])->name('add');
//     Route::get('/update/{id}', [PostController::class, 'update'])->name('update');
//     Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete');
//     Route::post('/delete-any', [PostController::class, 'handleDeleteAny'])->name('delete-any');
//     Route::get('/restore/{id}', [PostController::class, 'restore'])->name('restore');
//     Route::get('/force-delete/{id}', [PostController::class, 'forceDelete'])->name('force-delete');
// });
// Route::get('san-pham/{id}', [HomeController::class, 'getDetail']);

// Route::middleware('auth.admin')->prefix('admin')->group(function () {
//     Route::resource('/', DashboardController::class);
//     Route::middleware('auth.admin.product')->resource('products', ProductsController::class);
// });




// Route::get('get-info', [HomeController::class, 'getArray']);

// Route::get('demo-response', function () {

//     //Response trả về trình duyệt từ Server     
//     //C1: sd class Response
//     // $response = new Response('Hoc lap trinh tai Unicode', 201);
//     // dd($response);
//     // return $response;

//     //C2: sd helper response
//     // $response = response('Học lập trình tại Unicode', 200);
//     // dd(response());
//     // return $response;


//     // Gán header vào Response
//     // $content = 'Học lập trình tại Unicode';
//     // $response = (new Response($content, 200))->header('Content-Type', 'text/plain');

//     // $content = json_encode([
//     //     'Item1',
//     //     'Item2',
//     //     'Item3'
//     // ]);
//     // $response = (new Response($content, 200))->header('Content-Type', 'application/json');
//     // return $response;

//     //Gán cookie vào Response
//     // $response = (new Response)->cookie('unicode', 'Học lập trình PHP - Laravel', 30); //cookie tồn tại trong 30 phút
//     // return $response;

//     //Gán view vào Response
//     //C1: Thông thường
//     // return view('clients.demo');
//     //C2: Sd qua helper response()
//     // $title = 'Laravel';
//     // $content = 'Learn Laravel Application PHP 10.x';
//     // $response = response()->view('clients.demo', compact('title', 'content'), 200)->header('Content-Type', 'text/html');
//     // return $response;

//     //Method json()
//     // $profile = [
//     //     'name' => 'Dinomanh',
//     //     'email' => 'manhnguyen@gmail.com',
//     //     'password' => '12345'
//     // ];
//     // return response()->json($profile)->header('Content-Type', 'application/json');

//     //redirect():thường dùng để chuyển hướng từ phương thức POST về phương thức GET
//     // echo old('username');
//     return view('clients.demo');
// })->name('demo-response');

// Route::get('demo-response-2', function (Request $request) {
//     // dd($request);
//     return $request->cookie('unicode');
// });

// Route::post('demo-response', function (Request $request) {
//     if (!empty($request->username)) {
//         // return redirect()->route('demo-response');
//         return back()->withInput()->with('mess', 'Success');
//     }
//     //redirect()->with(): flash session: thường dùng để thông báo message vì nó có thời gian sống rất ngắn(chỉ hiển thị 1 lần)
//     return redirect()->route('demo-response')->with('mess', 'No data');
// });

// Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/', function () {
    return '<h1>Home Page</h1>';
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('msg', 'Link xác nhận đã được gửi lại tới email của bạn');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
