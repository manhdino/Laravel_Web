<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $lists = User::all();
        return view('admin.users.list', compact('lists'));
    }

    public function add()
    {
        return view('admin.users.add');
    }

    public function edit()
    {
        return view('admin.users.edit');
    }

    public function delete()
    {
        return 'delete successfully';
    }
}
