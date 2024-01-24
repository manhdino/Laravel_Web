<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Categories;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'status'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'categories_posts', 'category_id', 'post_id')->withPivot('created_at', 'status')->wherePivot('status', 1);
    }
}
