<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.list');
    }

    public function add()
    {
        $this->authorize('post.add');
        return '<h2>Bạn có quyền thêm bài viết</h2>';
    }

    public function edit(Post $post)
    {
        if (Gate::allows('post.edit', $post)) {
            return 'Bạn có quyền sửa bài viết với id:  ' . $post->id;
        }
        if (Gate::denies('post.edit', $post)) {
            return 'Bạn không có quyền sửa bài viết với id:  ' . $post->id;
        }

        //Kiểm tra xem user có quyền hay không
        // $user = User::find(13);
        // if (Gate::forUser($user)->allows('post.edit', $post)) {
        //     return 'User id: ' . $user->id . ' có quyền edit bài viết với id:  ' . $post->id;
        // }
        // if (Gate::forUser($user)->denies('post.edit', $post)) {
        //     return 'User id: ' . $user->id . ' không có quyền edit bài viết với id: ' . $post->id;
        // }
    }
}
