<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users ORDER BY created_at ASC');
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (fullname, email,created_at) VALUES (?,?,?)', $data);
    }
}
