<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'categories_posts', 'category_id', 'post_id');
    }
}
