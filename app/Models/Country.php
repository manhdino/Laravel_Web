<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Post;
use App\Models\Users;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';

    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, Users::class, 'country_id', 'user_id', 'id', 'id');
    }
}
