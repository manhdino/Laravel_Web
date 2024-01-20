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

    public function learnQueryBuilder()
    {

        //Lấy tất cả bản ghi -> trả về 1 mảng 
        //$DataAll =  DB::table($this->table)->get();
        // dd($DataAll);

        //Lấy bản ghi đầu tiên 
        // $DataFirst = DB::table($this->table)->first();
        // dd($DataFirst);

        //Select cột trong mảng -> trả về 1 collection
        // $DataSelect = DB::table($this->table)->select('id', 'fullname as hoten', 'email')->get();
        // dd($DataSelect);

        //Truy vấn với WHERE
        //$DataQuery = DB::table($this->table)->select('email')->where('fullname', '=', 'dinomanh')->get();

        // AND WHERE
        // $DataQuery = DB::table($this->table)->select('fullname', 'email')->where([['id', '>=', 9], ['id', '<=', 11]])->get();
        // dd($DataQuery);

        //OR WHERE
        // $DataQuery = DB::table($this->table)->select('fullname', 'email')->where('id', '=', '10')->orWhere('id', '=', '12')->get();
        // dd($DataQuery);

        //Gom nhóm vs WHERE : A AND ( B OR C)

        // DB::enableQueryLog();
        // $DataQuery = DB::table($this->table)->select('*')->where('id', '>', 10)->where(function ($query) {
        //     $query->where('email', 'manhnguyen6@gmail.com')->orWhere('fullname', 'dinomanh5');
        // })->get();
        // $sql = DB::getQueryLog();
        // dd($sql);
        // dd($DataQuery);

        //WHERE với LIKE
        $DataQuery = DB::table($this->table)->select('*')->where('fullname', 'like', '%dinomanh%')->get();
        dd($DataQuery);
    }
}
