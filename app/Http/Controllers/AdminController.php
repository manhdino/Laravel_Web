<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller

{

    public function index()
    {
        return '<h1>Welcome Admin</h1>';
    }

    //todo: admin login form
    public function login_form()
    {
        if (View::exists('admin.login-form')) {
            return view('admin.login-form');
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    //todo: admin login post
    public function login_post(Request $request)
    {
        $credentials = $request->except(['_token']);

        if (isAdminActive($credentials['email'])) { //trường isActive = 1
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('msg', 'Email hoặc mật khẩu không hợp lệ');
            }
        }
        return back()->with('msg', 'Tài khoản chưa được kích hoạt');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    //todo: admin logout functionality
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.form');
    }
}
