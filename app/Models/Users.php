<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM ' . $this->table . ' ORDER BY created_at ASC');
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO ' . $this->table . ' (fullname, email,created_at) VALUES (?,?,?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data[] = $id;
        DB::update('UPDATE ' . $this->table . ' SET fullname=?,email=?,updated_at=? WHERE id=?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }

    public function statement($sql) //Thực thi bất cứ câu lệnh Sql nào nhưng chỉ trả về trạng thái true/false
    {
        return DB::statement($sql);
    }
}
