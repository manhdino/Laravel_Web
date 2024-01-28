<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;




class PostController extends Controller
{
    public function index(Request $request, Post $post)
    {

        //C1:
        // if ($request->user()->can('viewAny', $post)) {
        //     return view('admin.list');
        // }
        // if ($request->user()->cannot('viewAny', $post)) {
        //     abort(403);
        // }

        //C2:
        $this->authorize('viewAny', $post);
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

    public function detail(Request $request, Post $post)
    {
        //C1
        // if ($request->user()->can('view', $post)) {
        //     return 'Bạn (' . $request->user()->username . ') có quyền sửa bài viết với id:  ' . $post->id;
        // }
        // if ($request->user()->cannot('view', $post)) {
        //     abort(403);
        // }

        //C2:
        $this->authorize('view', $post);
        return 'Bạn (' . $request->user()->username . ') có quyền sửa bài viết với id:  ' . $post->id;
    }
}
