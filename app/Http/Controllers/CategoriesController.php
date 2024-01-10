<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
    }

    // Hiển thị danh sách chuyên mục (GET)
    public function index()
    {
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
    public function addCategory()
    {
        return view('clients.categories.add');
    }

    //Thêm dữ liệu vào chuyên mục (POST)
    public function handleAddCategory()
    {
        // return 'Submit thêm chuyên mục';
        return redirect(route("categories.add"));
    }

    //Xóa category (DELETE)
    public function deleteCategory($id)
    {
        return 'Submit xóa chuyên mục' . $id;
    }
}
