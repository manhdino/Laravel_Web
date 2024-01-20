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

        // $statement = $this->users->statement('SELECT * FROM users');
        // dd($statement);
        $this->users->learnQueryBuilder();
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

    public function update(Request $request, $id = 0)
    {
        // dd($id);
        $title = 'Cập nhật người dùng';
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);
            // dd($userDetail);
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
                $request->session()->put('id', $id);
                return view('clients.users.edit', compact('title', 'userDetail'));
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
    }

    public function postUpdate(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $rules = [
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id
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

        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);
        return redirect()->back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);
            // dd($userDetail);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Không thể xóa người dùng.Vui lòng kiểm tra lại';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
