<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    private $user = null;
    private $group = null;
    public function __construct()
    {
        $this->user = new User();
        $this->group = new Group();
    }
    public function index()
    {
        $lists = $this->user::all();
        return view('admin.users.list', compact('lists'));
    }

    public function add()
    {
        $groups = $this->group::all();
        return view('admin.users.add', compact('groups'));
    }

    public function postAdd(Request $request)
    {

        //Validate

        $request->validate(
            [
                'name' => 'required|min:6',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'group_id' => ['required', function ($attribute, $value, $fail) {
                    if ($value == 0) {
                        $fail('Vui lòng chọn nhóm');
                    }
                }]
            ],
            [
                'required' => ':attribute không được để trống',
                'email' => ':attribute không đúng định dạng email',
                'unique' => ':attribute đã có người sử dụng',
                'min' => ':attribute phải có tối thiểu :min kí tự'
            ],
            [
                'name' => 'Tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'group_id' => 'Nhóm'
            ]

        );

        //Save new user information into database
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->group_id = $request->group_id;
        $this->user->save();
        return redirect()->route('admin.users.index')->with('msg', 'Thêm người dùng thành công');
    }

    public function edit()
    {
        return view('admin.users.edit');
    }

    public function postEdit()
    {
        return 'Post Edit';
    }

    public function delete()
    {
        return 'delete successfully';
    }
}
