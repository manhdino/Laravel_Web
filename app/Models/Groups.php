<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'groups';
    public function getAllGroups()
    {
        // $users = DB::select('SELECT * FROM ' . $this->table . ' ORDER BY created_at ASC');
        $groups = DB::table($this->table)->get();
        return $groups;
    }
}
