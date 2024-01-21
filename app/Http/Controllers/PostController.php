<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = new Post();
        $post->title = 'Bài viết 3';
        $post->content = 'Nội dung bài viết 3';
        $post->status = 1;
        $post->save();
        $allPosts = Post::all();
        dd($allPosts);
    }
}
