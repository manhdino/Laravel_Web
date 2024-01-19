<?php

namespace App\Http\Controllers;

use Closure;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use League\CommonMark\Extension\DescriptionList\Node\Description;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $data = [];
    public function index()
    {
        // $title = "Learn Laravel PHP Framework";
        // $content = 'Learn Laravel 8x Framework';
        // $dataView = [
        //     'title' => $title,
        //     'content' => $content,
        // ];
        // return view('home', $dataView); //import and load view home.php file
        //return view('home', compact('title', 'content')); // chuyển sang dạng mảng như trên(2 cách dùng giống hệt nhau)
        // return view('home', with(['title' => $title, 'content' => $content]));
        // return View::make('home', compact('title', 'content'));
        // return view('homeBlade', compact('title', 'content'));
        //$contentView = view('home');
        //  dd($contentView); //var_dump
        //  $contentView = $contentView->render();
        //  dd($contentView);
        //  echo $contentView;

        // $this->data['title'] = 'Welcome to my website';
        // $this->data['content'] = 'Today we learn about Framework Laravel <b>PHP</b> 10.x';
        // $this->data['description'] = '<h1>What is PHP?</h1>';
        // $this->data['index'] = 1;
        // $this->data['dataArr'] = [
        //     'item1',
        //     'item2',
        //     'item3',
        // ];
        // $this->data['skey'] = 6;
        // $this->data['number'] = 2;
        $this->data['content'] = 'Đặt hàng thành công!';
        // $user = DB::select('select * from users');
        // $user = DB::select('SELECT * FROM users WHERE id = ?', [4]);
        $user = DB::select('SELECT * FROM users WHERE email =:email', [
            'email' => 'dinomanh3@gmail.com'
        ]);


        // return view('homeBlade', $this->data);
        return view('clients.home', $this->data);
    }

    public function  listProducts()
    {
        return view('clients.products.list', $this->data);
    }
    public function addProduct()
    {
        $this->data['title'] = 'Thêm sản phẩm';
        return view('clients.products.add', $this->data);
    }

    // public function isUppercase($attribute, $value, $fail)
    // {
    //     if (strtoupper($value) !== $value) {
    //         $fail(':attribute phải viết hoa');
    //     }
    // }
    public function handleAddProduct(Request $request)
    {
        //Validation

        //C1: sử dụng method validate()
        //Nếu validate không thành công Laravel sẽ tự động redirect về Request trước 
        //kèm theo thông báo được gán vào Flash Session

        //normal rules
        // $rules = [
        //     'product_name' => 'required|min:6',
        //     'product_price' => 'required|integer'
        // ];

        //custom rules 
        $rules = [
            //  'product_name' => ['required', 'min:6', new Uppercase], //using Rule Object
            'product_name' => ['required', 'min:6', function (string $attribute, mixed $value, Closure $fail) { //using Closure 
                if (strtoupper($value) !== $value) {
                    $fail(":attribute phải viết hoa");
                }
            }],
            'product_price' => 'required|integer'
        ];
        //C1.1
        // $messages = [
        //     'product_name.required' => ':attribute bắt buộc phải nhập',
        //     'product_price.required' => ':attribute bắt buộc phải nhập',
        //     'product_name.min' => ':attribute phải có ít nhất :min kí tự',
        //     'product_price.integer' => ':attribute phải là 1 số nguyên'
        // ];

        //C1.2:
        $messages = [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải có ít nhất :min kí tự',
            'integer' => ':attribute phải là 1 số nguyên',
        ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];

        // $request->validate($rules, $messages);


        //C2: Validation sử dụng Form Request
        // thay tham số truyền vào là class Request thành ProductRequest


        //C3: sd class Validator
        //C3.1 Validator::make($request->all(), $rules, $messages, $attributes)->validate();
        //C3.2 
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        $request->flash();
        if ($validator->fails()) {
            $validator->errors()->add('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu.');
        } else {
            return redirect()->route('home.products')->with('msg', 'Thêm sản phẩm thành công');
        }
        return back()->withErrors($validator);

        //Xử lý thêm dữ liệu vào DB
        // dd($request->all());
    }
    public function updateProduct(Request $request)
    {
        dd($request);
    }
    public function getDetail($id)
    {
        $name = 'Inphone 15 PRO MAX';
        return view('clients.products.detail', compact('id', 'name'));
    }

    public function getArray()
    {
        $contentArr = [
            'name' => 'Laravel 8.x',
            'lesson ' => 'Khóa học lập trình Laravel ',
            'academy' => 'Unicode'
        ];
        return $contentArr;
    }

    public function downloadImage(Request $request)
    {
        // dd($request);
        echo $request->image;
        if (!empty($request->image)) {
            $image = trim($request->image);


            //Stream Download
            //Random file name
            $fileName = 'image_' . uniqid() . '.jpg';

            //Original file name
            //$fileName = basename($image);

            // return response()->streamDownload(function () use ($image) {
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $fileName);

            //Local Download
            return response()->download($image, $fileName);
        }
    }
}
