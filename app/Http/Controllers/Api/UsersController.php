<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{


    private $users;

    public function __construct()
    {
        $this->users = new User();
    }
    public function index(Request $request)
    {

        //Filter
        $where = [];

        if ($request->name) {
            $where[] = ['name', 'like', '%' . $request->name . '%'];
        }
        if ($request->email) {
            $where[] = ['email', 'like', '%' . $request->email . '%'];
        }



        $users = User::orderBy('id', 'desc');

        if (!empty($where)) {
            $users = $users->where($where);
        }

        // $users = $users->with('posts')->get();

        $users = $users->get();
        if ($users->count() > 0) {
            $statusCode = 200;
            $statusText = 'success';
        } else {
            $statusCode = 204;
            $statusText = 'no data';
        }
        // $response = [
        //     'status' => $status,
        //     'data' => $users,
        // ];

        //return $response;

        // $users = UserResource::collection($users)

        $users = new UserCollection($users, $statusText, $statusCode);
        return $users;
    }

    public function detail($id)
    {

        //$user = User::with('posts')->find($id);
        $user = User::find($id);
        if ($user) {
            $statusCode = 200;
            $user = new UserResource($user);
            $statusText = 'success';
        } else {
            $statusCode = 404;
            $statusText = 'not found';
        }

        $response = [
            'data' => $user,
            'statusCode' => $statusCode,
            'statusText' => $statusText
        ];
        return $response;
    }

    public function create(Request $request)
    {

        $this->validation($request);

        $this->users->name = $request->name;
        $this->users->email = $request->email;
        $this->users->password = Hash::make($request->password);
        $this->users->save();


        if ($this->users->id) {
            $response = [
                'statusText' => 'created',
                'statusCode ' => 201,
                'data' => $this->users,
            ];
        } else {
            $response = [
                'statusCode' => 500,
                'statusText' => 'server error',
            ];
        }

        return $response;
    }

    public function update(Request $request, $id)
    {

        $method = $request->method();

        $response = [];

        $user = User::find($id);

        if (!$user) {
            $response = [
                'statusText' => 'not found',
                'statusCode' => 204,
            ];
        } else {

            $this->validation($request, $id);

            if ($method == 'PUT') {
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                } else {
                    $user->password = null;
                }
            } else { //PATCH
                if ($request->name) {
                    $user->name = $request->name;
                }

                if ($request->email) {
                    $user->email = $request->email;
                }

                if ($request->password) {
                    $user->password = $request->password;
                }
            }
            $user->save();
            $response = [
                'statusCode' => 200,
                'statusText' => 'success',
                'data' => $user
            ];
        }
        return $response;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            $status = 'not found';
        } else {
            $status = $user->delete();
            if ($status) {
                $status = 'success';
            } else {
                $status = 'error';
            }
        }
        $response = [
            'status' => $status,
        ];
        return $response;
    }

    public function validation(Request $request, $id = 0)
    {

        $emailValidation = 'required|email|unique:users,email';

        if (!empty($id)) {
            $emailValidation = $emailValidation . ',' . $id;
        }
        $rules = [
            'name' => 'required|min:6',
            'email' => $emailValidation,
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

        return $request->validate($rules, $messages, $attributes);
    }
}
