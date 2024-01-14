<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Learn Laravel PHP Framework";
        $content = 'Learn Laravel 8x Framework';
        // $dataView = [
        //     'title' => $title,
        //     'content' => $content,
        // ];
        // return view('home', $dataView); //import and load view home.php file
        //return view('home', compact('title', 'content')); // chuyển sang dạng mảng như trên(2 cách dùng giống hệt nhau)
        // return view('home', with(['title' => $title, 'content' => $content]));
        // return View::make('home', compact('title', 'content'));
        return view('homeBlade', compact('title', 'content'));
        //$contentView = view('home');
        //  dd($contentView); //var_dump
        //  $contentView = $contentView->render();
        //  dd($contentView);
        //  echo $contentView;
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
}
