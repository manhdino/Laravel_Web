<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $user = [];
        $statusCode = 404;
        $statusText = 'Missing input';

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $statusCode = 200;
            $statusText = 'success';
            $token = $request->user()->createToken('auth_token');
        } else {
            $statusCode = 401;
            $statusText = 'Unauthorized';
        }
        $response = [
            'data' => $user,
            'token' => $token->plainTextToken,
            'statusCode' => $statusCode,
            'statusText' => $statusText
        ];
        return $response;
    }
}
