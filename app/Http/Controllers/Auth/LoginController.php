<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            $this->username() . '.required' => 'Tên đăng nhập bắt buộc phải nhập',
            $this->username() . '.string' => 'Kiểu dữ liệu tên đăng nhập không hợp lệ',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.string' => 'Kiểu dữ liệu mật khẩu không hợp lệ',
            'password.min' => 'Mật khẩu phải có ít nhất :min kí tự'
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['Tên đăng nhập hoặc mật khẩu không hợp lệ'],
        ]);
    }

    public function username()
    {
        return 'username';
    }

    protected function credentials(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $fieldDB = 'email';
        } else {
            $fieldDB = 'username';
        }

        $data = [
            $fieldDB => $request->username,
            'password' => $request->password
        ];
        return $data;
    }
}
