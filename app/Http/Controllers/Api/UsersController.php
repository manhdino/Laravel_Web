<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    private $users;

    public function __construct()
    {
        $this->users = new User();
    }
    public function index()
    {
        return 'ListUsers';
    }

    public function detail(User $user)
    {
        return 'User Detail ' . $user;
    }

    public function create(Request $request)
    {

        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
        $messages = [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng email',
            'unique' => ':attribute đã có người sử dụng',
            'min' => ':attribute phải có tối thiểu :min kí tự'
        ];

        $attributes = [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];

        $request->validate($rules, $messages, $attributes);

        $this->users->name = $request->name;
        $this->users->email = $request->email;
        $this->users->password = Hash::make($request->password);
        $this->users->save();

        $response = [
            'status ' => 'success',
            'data' => $this->users,

        ];

        return $response;
    }

    public function update(Request $request, User $user)
    {
        echo $request->method();
        return $request->all();
    }

    public function delete(User $user)
    {
        return 'Delete User ' . $user;
    }
}
