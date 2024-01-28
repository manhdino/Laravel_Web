<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return '<h2>List Posts</h2>';
    }

    public function add()
    {
        return '<h2>Add</h2>';
    }

    public function edit($id, Post $post)
    {
        $post = Post::find($id);
        if (Gate::allows('post.edit', $post)) {
            return 'Cho phép sửa bài viết  ' . $id;
        }
        if (Gate::denies('post.edit', $post)) {
            return 'Không cho phép sửa bài viết ' . $id;
        }
    }
}
