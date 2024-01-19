<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $title = 'Danh sách người dùng';

        $usersList = $this->users->getAllUsers();
        //dd($users);

        return view('clients.users.list', compact('title', 'usersList'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $rules = [
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ];

        $messages = [
            'fullname.required' => ':attribute bắt buộc phải nhập',
            'email.required' => ':attribute bắt buộc phải nhập',
            'fullname.min' => ':attribute phải có ít nhất :min kí tự',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã tồn tại'
        ];

        $attributes = [
            'fullname' => 'Tên người dùng',
            'email' => 'Email'
        ];
        $request->validate($rules, $messages, $attributes);

        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }
}
