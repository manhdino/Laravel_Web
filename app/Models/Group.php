<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function postBy($user_id)
    {
        $user_creator = User::find($user_id);
        if ($user_creator) {
            return $user_creator->name;
        }
        return null;
    }
}
