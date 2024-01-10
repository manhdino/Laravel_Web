<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        /**
         * Nếu là trang danh sách chuyên mục --> hiển thị ra dòng chữ xin chào Unicode
         * 
         */
        if ($request->is('categories')) {
            echo 'Hello Unicode';
        }
    }

    // Hiển thị danh sách chuyên mục (GET)
    public function index(Request $request)
    {
        // if (isset($_GET['id'])) {
        //     echo $_GET['id'];
        // }

        // dd($request);
        // Request: http:....?id=123&name=Hoang+An
        $dataRequest = $request->all();
        // echo $dataRequest['id'];
        // echo  $request->all()['name'];
        $url = $request->url(); //sẽ ko lấy được query string(?id=1&name=John)
        echo 'Url: ' . $url;
        $fullUrl = $request->fullUrl();
        echo '<br/>';
        echo 'FullUrl: ' . $fullUrl;
        $path = $request->path();
        echo '<br/>';
        echo 'Path: ' . $path;
        echo '<br/>';
        $method = $request->method(); //1 Request có nhiều phương thức(khi sd any hoặc match khi khai báo route)
        echo 'Method: ' . $method;
        echo '<br/>';
        if ($request->isMethod('GET')) {
            echo 'Check GET Method: true';
        }
        echo '<br/>';
        $ip = $request->ip();
        echo 'IP Address: ' . $ip;
        // echo '<br/>';
        $server = $request->server(); //giống như $_SERVER
        // echo '<pre>';
        // print_r($server);
        // echo '</pre>';
        $header = $request->header();
        // dd($header);
        echo '<br/>';
        $id = $request->input('id'); //Query String ?id=123
        echo 'Id Query String: ' . $id ?? "Null";
        //C2:
        $id2 = $request->id; ///Query String ?id=123
        echo 'Id2:' . $id2;
        echo '<br/>';
        // dd($request->input()); //Array Query String 
        // echo '<br/>';
        //Không sử dụng thông qua đối tượng $request cua Class Request mà sử dụng hàm request() có sẵn thường sử dụng trong view
        $id3 = request()->id;
        echo 'Id3: ' . $id3;
        echo '<br/>';
        $name = request('name', 'Unicode'); //Unicode là giá trị mặc định nếu ?name=.. không tồn tại
        echo 'Name: ' . $name;
        return view('clients.categories.list');
    }

    // Lấy ra 1 chuyên mục theo id (GET)
    public function getCategory($id)
    {
        // return 'Chi tiết chuyên mục' . $id;
        return view('clients.categories.edit');
    }

    //Sửa 1 chuyên mục (POST)
    public function updateCategory($id)
    {
        return 'Sumbit sửa chuyên mục' . $id;
    }

    //Show form thêm category (GET)
    public function addCategory(Request $request)
    {
        $path = $request->path();
        echo $path;
        return view('clients.categories.add');
    }

    //Thêm dữ liệu vào chuyên mục (POST)
    public function handleAddCategory(Request $request)
    {
        // return 'Submit thêm chuyên mục';
        //Làm việc vs PHP thuần
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        //Làm việc vs Laravel
        $dataRequest = $request->all();
        // dd($dataRequest);

        if ($request->isMethod('POST')) {
            echo 'Check POST Method: true';
        }
        // return redirect(route("categories.add"));
    }

    //Xóa category (DELETE)
    public function deleteCategory($id)
    {
        return 'Submit xóa chuyên mục' . $id;
    }
}