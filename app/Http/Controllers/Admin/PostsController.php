<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    private $post = null;

    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $lists = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.list', compact('lists'));
    }

    public function add()
    {
        return view('admin.posts.add');
    }

    public function postAdd(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Tiêu đê không được để trống',
                'content.required' => 'Nội dung không được để trống',
            ],

        );


        $this->post->title = $request->title;
        $this->post->content = $request->content;
        $this->post->user_id = Auth::user()->id;
        $this->post->created_at = date('Y-m-d H:i:s');
        $this->post->save();
        return redirect()->route('admin.posts.index')->with('msg', 'Thêm bài viết thành công');
    }

    public function edit(Post $post)
    {
        if (Auth::user()->id == $post->user_id) {
            return view('admin.posts.edit', compact('post'));
        }
        return redirect()->route('admin.posts.index')->with('msg_error', 'Bạn không thể sửa bài viết của người khác');
    }

    public function postEdit(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Tiêu đê không được để trống',
                'content.required' => 'Nội dung không được để trống',
            ],

        );
        $post->title = $request->title;
        $post->content = $request->content;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route('admin.posts.index')->with('msg', 'Cập nhật bài viết thành công');
    }

    public function delete(Post $post)
    {

        if (Auth::user()->id == $post->user_id) {
            Post::destroy($post->id);
            return redirect()->route('admin.posts.index')->with('msg', 'Xóa bài viết thành công');
        }
        return redirect()->route('admin.posts.index')->with('msg_error', 'Bạn không thể xóa bài viết của người khác');
    }
}