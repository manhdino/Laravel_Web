<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Danh sách người dùng';

        $users = DB::select('SELECT * FROM users ORDER BY created_at ASC');
        //dd($users);

        return view('clients.users.list', compact('title', 'users'));
    }
}
