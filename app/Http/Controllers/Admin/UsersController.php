<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function edit(User $user)
    {
        $groups = $this->group::all();
        return view('admin.users.edit', compact('groups', 'user'));
    }

    public function postEdit(User $user, Request $request)
    {

        $request->validate(
            [
                'name' => 'required|min:6',
                'email' => 'required|email|unique:users,email,' . $user->id,
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
                'group_id' => 'Nhóm'
            ]

        );

        //Update user information into database
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->group_id = $request->group_id;
        $user->save();
        return back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete(User $user)
    {
        if (Auth::user()->id != $user->id) { //Tài khoản đang đăng nhập không phải là tài khoản cần xóa
            User::destroy($user->id);
            return redirect()->route('admin.users.index')->with('msg', 'Xóa người dùng thành công');
        }
        return redirect()->route('admin.users.index')->with('msg_error', 'Bạn không thể xóa tài khoản đang đăng nhập');
    }
}
