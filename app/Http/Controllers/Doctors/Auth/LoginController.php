<?php

namespace App\Http\Controllers\Doctors\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('doctor')->check()) {
            echo 'Check OK';
            $doctorInfo = Auth::guard('doctor')->user();
            //dd($doctorInfo);
        }
        return view('doctors.auth.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request);

        //Bỏ token tạo từ @csrf của Form
        // dd($request->except(['_token']));
        $dataLogin = $request->except(['_token']);

        if (isDoctorActive($dataLogin['email'])) {

            $checkLogin = Auth::guard('doctor')->attempt($dataLogin);
            if ($checkLogin) {
                return redirect(RouteServiceProvider::DOCTOR);
            }
            return back()->with('msg', 'Email hoặc mật khẩu không hợp lệ');
        }

        return back()->with('msg', 'Tài khoản chưa được kích hoạt');
    }
}
