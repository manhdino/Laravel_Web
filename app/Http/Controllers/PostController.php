<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = new Post();
        // $post->title = 'Bài viết 4';
        // $post->content = 'Nội dung bài viết 4';
        // $post->status = 0;
        // $post->save();
        // $allPosts = Post::all();
        // dd($allPosts);

        echo '<h2>Query Eloquent Model</h2>' . '<hr />';

        //Lấy tất cả bản ghi
        echo '<h3>Tất cả bản ghi:</h3>';
        $allPosts = Post::all(); // Trả về collection(trường hợp có nhiều bản ghi) nên ko thể check bằng hàm empty
        if ($allPosts->count() > 0) {
            foreach ($allPosts as $item) {
                echo $item->title . '<br />';
            }
        }
        echo '<hr />';

        //Bản ghi có status = 1
        echo '<h3>Bản ghi có status = 1</h3>';
        $allStatus1 = $allPosts->reject(function ($post) {
            return $post->status == 0;
        });
        if ($allStatus1->count() > 0) {
            foreach ($allStatus1 as $item) {
                echo 'status: ' . $item->status . ' title: ' . $item->title . '<br />';
            }
        }
    }

    public function add()
    {
        $dataInsert = [
            'title' => 'Bài viết 8',
            'content' => 'Nội dung bài viết 8',
            'status' => 1
        ];
        //   $post = Post::create($dataInsert);

        // dd($post);

        //firstOrCreate()
        // $post =  Post::firstOrCreate(['id' => 28], $dataInsert);
        // dd($post);

        $post = new Post();
        $check = true;
        $post->title = 'Bài viết mới';
        $post->content = 'Nội dung bài viết mới';
        if ($check) {
            $post->status = 1;
        }
        $post->save();
        dd($post);
    }

    public function update($id = 0)
    {

        //Lấy ra bản ghi hiện tại
        $post = Post::find($id);

        //C1: Sử dụng save()
        // $post->title = 'Bài viết update';
        // $post->save();

        //C2: Sử dụng update()
        $dataUpdate = [
            'title' => 'Bài viết update',
            'content' => 'Nội dung bài viết update2',
        ];
        // $status = $post->update($dataUpdate); //Trả về kiểu boolean

        //C3: Sử dụng updateOrCreate
        Post::updateOrCreate(['id' => $id], $dataUpdate);
    }
}
